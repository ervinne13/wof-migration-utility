<?php

use App\Models\Module\ModuleFunction;
use App\Models\UserAccess;
use Illuminate\Database\Seeder;

class RPAddEditPostingGroupsAccess extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        ModuleFunction::$strictAuditGeneration = false;

        $editPostingGroupsAcceess = UserAccess::findOrNew(944);

        $editPostingGroupsAcceess->UA_FK_Module_id = 64;
        $editPostingGroupsAcceess->UA_AccessName   = 'Edit Posting Groups';
        $editPostingGroupsAcceess->UA_Trigger      = 'edit-posting-groups';
        $editPostingGroupsAcceess->UA_Icon         = "glyphicon-plus";
        $editPostingGroupsAcceess->UA_Access_id    = 944;
        $editPostingGroupsAcceess->UA_Outside      = 0;
        $editPostingGroupsAcceess->UA_Inside       = 1;
        $editPostingGroupsAcceess->UA_Inline       = 1;
        $editPostingGroupsAcceess->UA_Header       = 0;
        $editPostingGroupsAcceess->UA_Get          = 0;

        $editPostingGroupsAcceess->save();
    }

}
