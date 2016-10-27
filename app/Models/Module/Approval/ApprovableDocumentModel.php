<?php

namespace App\Models\Module\Approval;

use Exception;
use Illuminate\Support\Facades\DB;
use Log;
use App\Models\Administration\ApprovalSetup;
use App\Models\SGModel;
use App\Models\User\Position;
use App\Models\User\User;

abstract class ApprovableDocumentModel extends SGModel {

    //  
    /*     * ************************************************************************* */
    //  <editor-fold defaultstate="collapsed" desc="Abstract Functions">

    protected abstract function getDocNo();

    protected abstract function getDocDate();

    protected abstract function getLocation();

    protected abstract function getAmount();

    protected abstract function setStatus($status);

    //  </editor-fold>

    /*     * ************************************************************************* */
    //  <editor-fold defaultstate="collapsed" desc="Public Utility Functions">

    public function getNSCode() {
        $docNo = $this->getDocNo();
        if ($docNo) {
            return $this->extractNSCodeFromDocNo($docNo);
        } else {
            throw new Exception("Unable to get NS Code, a document number is required to extract it.");
        }
    }

    public function extractNSCodeFromDocNo($docNo) {
        //  get everything except the last strings after the last "-"
        $splittedDocNo  = explode("-", $docNo);
        $docNoPartsSize = count($splittedDocNo);
        if ($docNoPartsSize > 2) {
            //  remove $splittedDocNo[$docNoPartsSize - 1] and "-"
            $NSCodeLen = strlen($docNo) - (strlen($splittedDocNo[$docNoPartsSize - 1]) + 1);
            return substr($docNo, 0, $NSCodeLen);
        } else {
            return $splittedDocNo[0];
        }
    }

    public function getNextApproverPosition() {

        $firstPendingDocumentTrack = DocumentTracking::where("DT_DocNo", $this->getDocNo())
                ->join(Position::TABLE, 'P_Position_id', '=', 'DT_Approver')
                ->where("DT_Status", DocumentTracking::STATUS_PENDING)
                ->orderBy("DT_EntryNo")
                ->first()
        ;

        if ($firstPendingDocumentTrack) {
            return $firstPendingDocumentTrack->P_Position;
        } else {
            return null;
        }
    }

    //  </editor-fold>

    /*     * ************************************************************************* */
    //  <editor-fold defaultstate="collapsed" desc="Approval Functions">

    public function sendApprovalRequest(User $sender) {

        $NSCode = $this->getNSCode();

        try {
            DB::beginTransaction();

            //  get approval setup
            $approvalSetup = ApprovalSetup::where('AS_FK_NS_Id', $NSCode)->get();

            $docType = isset($this->documentType) ? $this->documentType : NULL;

            //  create document tracking for each approval setup entry
            foreach ($approvalSetup AS $setupEntry) {

                $docTracking               = new DocumentTracking();
                $docTracking->DT_FK_NSCode = $NSCode;
                $docTracking->DT_DocNo     = $this->getDocNo();
                $docTracking->DT_DocDate   = $this->getDocDate();
                $docTracking->DT_DocType   = $docType;
                $docTracking->DT_Sender    = $sender->U_User_id;
                $docTracking->DT_Approver  = $setupEntry->AS_ApproverID;
                $docTracking->DT_Status    = DocumentTracking::STATUS_PENDING;
                $docTracking->DT_Location  = $this->getLocation();
                $docTracking->DT_EntryDate = date("Y-m-d H:m:s");
                $docTracking->DT_Unlimited = $setupEntry->AS_Unlimited;
                $docTracking->DT_Required  = $setupEntry->AS_Required;
                $docTracking->DT_Amount    = $setupEntry->AS_Amount;

                $docTracking->save();
            }

            if (count($approvalSetup) > 0) {
                $this->setStatus(DocumentTracking::STATUS_PENDING);
                $this->save();
            } else {
                throw new Exception("No approval setup available!");
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Log::error("Failed to send approval request for document {$this->getDocNo()}");
            Log::error($e);
            throw $e;
        }
    }

    public function approve(User $approver) {

        $docTrackingList = $this->getPendingDocTrackList();

        //  initial validation
        $this->validateApproval($docTrackingList, $approver);

        try {
            DB::beginTransaction();

            $docTrackingList[0]->DT_Status       = DocumentTracking::STATUS_APPROVED;
            $docTrackingList[0]->DT_ApprovedBy   = $approver->U_User_id;
            $docTrackingList[0]->DT_DateApproved = date("Y-m-d H:m:s");

            $docTrackingList[0]->save();

            //  if there are more approvals and this current approver has "unlimited" level approval
            if (count($docTrackingList) > 1 && $docTrackingList[0]->DT_Unlimited == 1) {
                //  skip non required approvals
                $this->skipNonRequiredPendingDocTrack();
            }

            //  if this is the last approval
            if (count($docTrackingList) == 1) {
                $this->setStatus(DocumentTracking::STATUS_APPROVED);
                $this->save();
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Log::error("Failed to approve document {$this->getDocNo()}");
            Log::error($e);
            throw $e;
        }
    }

    public function cancelApproval(User $currentUser, $remarks) {

        if (!$remarks) {
            throw new Exception("Remarks are required");
        }

        $docTrackingList = $this->getPendingDocTrackList();

        //  initial validation
        $this->validateSelfProcess($docTrackingList, $currentUser);

        try {
            DB::beginTransaction();

            //  cancel the current doc track
            $docTrackingList[0]->DT_Status       = DocumentTracking::STATUS_CANCELLED;
            $docTrackingList[0]->DT_ApprovedBy   = $currentUser->U_User_id;
            $docTrackingList[0]->DT_Remarks      = $remarks;
            $docTrackingList[0]->DT_DateApproved = date("Y-m-d H:m:s");

            $docTrackingList[0]->save();

            //  skip the rest of doc track
            $this->skipPendingDocTrack();

            $this->setStatus(DocumentTracking::STATUS_CANCELLED);
            $this->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Log::error("Failed to cancel document {$this->getDocNo()}");
            Log::error($e);
            throw $e;
        }
    }

    //  </editor-fold>

    /*     * ************************************************************************* */
    //  <editor-fold defaultstate="collapsed" desc="Private Utility Functions">

    private function skipNonRequiredPendingDocTrack() {
        return DocumentTracking::where("DT_DocNo", $this->getDocNo())
                        ->where("DT_Status", DocumentTracking::STATUS_PENDING)
                        ->where("DT_Required", '0')
                        ->update(['DT_Status' => DocumentTracking::STATUS_SKIPPED]);
    }

    private function skipPendingDocTrack() {
        return DocumentTracking::where("DT_DocNo", $this->getDocNo())
                        ->where("DT_Status", DocumentTracking::STATUS_PENDING)
                        ->update(['DT_Status' => DocumentTracking::STATUS_SKIPPED]);
    }

    private function getPendingDocTrackList() {
        $docTrackingList = DocumentTracking::where("DT_DocNo", $this->getDocNo())
                ->where("DT_Status", DocumentTracking::STATUS_PENDING)
                ->orderBy("DT_EntryNo")//   first insert first
                ->get()
        ;

        return $docTrackingList;
    }

    private function validateApproval($docTrackingList, User $approver) {

        //  pending document tracking entries should contain at least one entry
        if (count($docTrackingList) <= 0 && isset($docTrackingList[0])) {
            throw new Exception("This document is not pending for approval!");
        }

        //  the user should be the next approver of the document
        if ($docTrackingList[0]->DT_Approver != $approver->U_FK_Position_id) {
            throw new Exception("You are not the next approver of this document");
        }
    }

    private function validateSelfProcess($docTrackingList, User $user) {
        //  pending document tracking entries should contain at least one entry
        if (count($docTrackingList) <= 0 && isset($docTrackingList[0])) {
            throw new Exception("This document is not pending for approval!");
        }

        //  the user should be the next approver of the document
        if ($docTrackingList[0]->DT_Sender != $user->U_User_id) {
            throw new Exception("You are not the sender of this document");
        }
    }

    //  </editor-fold>
}
