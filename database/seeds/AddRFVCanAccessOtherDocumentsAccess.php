<?php

use App\Models\Module\ModuleFunction;
use App\Models\UserAccess;
use Illuminate\Database\Seeder;

/**
 * php artisan db:seed --class=AddRFVCanAccessOtherDocumentsAccess
 */
class AddRFVCanAccessOtherDocumentsAccess extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        ModuleFunction::$strictAuditGeneration = false;
//
        $canAccessAllReimbursementDocuments    = UserAccess::findOrNew(945);

        $canAccessAllReimbursementDocuments->UA_FK_Module_id = 61;
        $canAccessAllReimbursementDocuments->UA_AccessName   = 'Can View All Documents';
        $canAccessAllReimbursementDocuments->UA_Trigger      = 'can-view-all-documents';
        $canAccessAllReimbursementDocuments->UA_Icon         = "glyphicon-plus";
        $canAccessAllReimbursementDocuments->UA_Access_id    = 945;
        $canAccessAllReimbursementDocuments->UA_Outside      = 0;
        $canAccessAllReimbursementDocuments->UA_Inside       = 1;
        $canAccessAllReimbursementDocuments->UA_Inline       = 1;
        $canAccessAllReimbursementDocuments->UA_Header       = 0;
        $canAccessAllReimbursementDocuments->UA_Get          = 0;

        $canAccessAllReimbursementDocuments->save();

        $canAccessAllRFVDocuments = UserAccess::findOrNew(946);

        $canAccessAllRFVDocuments->UA_FK_Module_id         = 283;
        $canAccessAllReimbursementDocuments->UA_AccessName = 'Can View All Documents';
        $canAccessAllReimbursementDocuments->UA_Trigger    = 'can-view-all-documents';
        $canAccessAllRFVDocuments->UA_Icon                 = "glyphicon-plus";
        $canAccessAllRFVDocuments->UA_Access_id            = 946;
        $canAccessAllRFVDocuments->UA_Outside              = 0;
        $canAccessAllRFVDocuments->UA_Inside               = 1;
        $canAccessAllRFVDocuments->UA_Inline               = 1;
        $canAccessAllRFVDocuments->UA_Header               = 0;
        $canAccessAllRFVDocuments->UA_Get                  = 0;

        $canAccessAllRFVDocuments->save();
    }

}
