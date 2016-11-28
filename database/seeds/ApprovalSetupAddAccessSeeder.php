<?php

use App\Models\Module\ModuleFunction;
use App\Models\UserAccess;
use Illuminate\Database\Seeder;

class ApprovalSetupAddAccessSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        ModuleFunction::$strictAuditGeneration = false;

        $addApprovalSetupAccess = UserAccess::findOrNew(905);

        $addApprovalSetupAccess->UA_FK_Module_id = 248;
        $addApprovalSetupAccess->UA_AccessName   = 'Add';
        $addApprovalSetupAccess->UA_Trigger      = 'administration/approval-setup/add';
        $addApprovalSetupAccess->UA_Icon         = "glyphicon-plus";
        $addApprovalSetupAccess->UA_Access_id    = 905;
        $addApprovalSetupAccess->UA_Outside      = 1;
        $addApprovalSetupAccess->UA_Header       = 1;
        $addApprovalSetupAccess->UA_Get          = 1;

        $addApprovalSetupAccess->save();
    }

}
