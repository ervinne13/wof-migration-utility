<?php

use App\Models\Module\ModuleFunction;
use App\Models\UserAccess;
use Illuminate\Database\Seeder;

class AddApprovalAndModuleApprovalDeletion extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        ModuleFunction::$strictAuditGeneration = false;

        $approvalDeleteAccess = UserAccess::findOrNew(959);

        $approvalDeleteAccess->UA_FK_Module_id = 248;
        $approvalDeleteAccess->UA_AccessName   = 'Delete';
        $approvalDeleteAccess->UA_Trigger      = 'action-delete-approval-setup';
        $approvalDeleteAccess->UA_Icon         = "glyphicon-remove";
        $approvalDeleteAccess->UA_Access_id    = 959;
        $approvalDeleteAccess->UA_Outside      = 1;
        $approvalDeleteAccess->UA_Inline       = 1;
        $approvalDeleteAccess->UA_Get          = 0;

        $approvalDeleteAccess->save();

        $moduleApprovalDeleteAccess = UserAccess::findOrNew(960);

        $moduleApprovalDeleteAccess->UA_FK_Module_id = 322;
        $moduleApprovalDeleteAccess->UA_AccessName   = 'Delete';
        $moduleApprovalDeleteAccess->UA_Trigger      = 'action-delete-module-approval-setup';
        $moduleApprovalDeleteAccess->UA_Icon         = "glyphicon-remove";
        $moduleApprovalDeleteAccess->UA_Access_id    = 960;
        $moduleApprovalDeleteAccess->UA_Outside      = 1;
        $moduleApprovalDeleteAccess->UA_Inline       = 1;
        $moduleApprovalDeleteAccess->UA_Get          = 0;

        $moduleApprovalDeleteAccess->save();
    }

}
