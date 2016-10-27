<?php

namespace App\Models\Module\Approval;

use App\Models\Administration\StoreProfile;
use App\Models\SGModel;
use App\Models\User\Position;
use App\Models\User\User;

class DocumentTracking extends SGModel {

    //  type safe status
    const STATUS_PENDING   = "Pending";
    const STATUS_APPROVED  = "Approved";
    const STATUS_REJECTED  = "Rejected";
    const STATUS_CANCELLED = "Cancelled";
    const STATUS_OPEN      = "Open";
    const STATUS_REVISED   = "Revised";
    const STATUS_SKIPPED   = "Skipped";

    //
    protected $primaryKey = "DT_EntryNo";
    protected $table      = 'tblCOM_DocTracking';

    public function scopePending($query, $docNo) {

        return $query
                        ->where("DT_DocNo", $docNo)
                        ->where("DT_Status", self::STATUS_PENDING)
        ;
    }

    public function scopeDataTable($query, $docNo) {

        $columns = [
            "DT_EntryNo",
            "DT_DocNo",
            "DT_EntryDate",
            "sender.U_Username AS DT_SenderName",
            "SP_StoreName AS DT_LocationName",
            "P_Position AS DT_ApproverPositionName",
            "approvedBy.U_Username AS DT_ApprovedBy",
            "DT_DateApproved",
            "DT_Status",
            "DT_Remarks",
        ];

        return $query
                        ->select($columns)
                        ->join(User::TABLE . ' AS sender', 'sender.U_User_id', '=', 'DT_Sender')
                        ->join(User::TABLE . ' AS approvedBy', 'approvedBy.U_User_id', '=', 'DT_Sender')
                        ->join(StoreProfile::TABLE, 'SP_StoreID', '=', 'DT_Location')
                        ->join(Position::TABLE, 'DT_Approver', '=', 'P_Position_id')
                        ->where("DT_DocNo", $docNo)
                        ->orderBy("DT_EntryNo", "Desc")
        ;
    }

}
