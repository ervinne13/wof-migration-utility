<?php

use App\Models\Module\Module;
use App\Models\UserAccess;
use Illuminate\Database\Seeder;

class ModuleApprovalSetupModuleSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $module = Module::where(["M_Description" => "Module Approval Setup"])->first();

        if (!$module) {
            $module = new Module();
        }

        $module->M_Description  = "Module Approval Setup";
        $module->M_Parent       = 9; // User and Approval Setup
        $module->M_Trigger      = "administration/module-approval-setup";
        $module->M_Module_id    = 322;
        $module->M_Level        = 2;
        $module->M_Icon         = '';
        $module->M_Active       = 1;
        $module->M_Replicate    = 0;
        $module->M_Header       = 0;
        $module->M_WithApproval = 0;

        $module->save();

        $viewAccess = UserAccess::findOrNew(906);
        $viewAccess->fill(["UA_FK_Module_id" => $module->M_Module_id, "UA_AccessName" => "View", "UA_Access_id" => 906, "UA_Trigger" => "", "UA_Icon" => '']);
        $viewAccess->save();

        $addAccess = UserAccess::findOrNew(907);
        $addAccess->fill(["UA_FK_Module_id" => $module->M_Module_id, "UA_AccessName" => "Add", "UA_Access_id" => 907, "UA_Trigger" => "administration/module-approval-setup/add", "UA_Icon" => 'glyphicon-plus', "UA_Outside" => 1, "UA_Header" => 1]);
        $addAccess->save();

        $editAccess = UserAccess::findOrNew(908);
        $editAccess->fill(["UA_FK_Module_id" => $module->M_Module_id, "UA_AccessName" => "Edit", "UA_Access_id" => 908, "UA_Trigger" => "administration/module-approval-setup/update", "UA_Icon" => 'glyphicon-edit', "UA_Outside" => 1, "UA_Inline" => 1, "UA_Get" => 1]);
        $editAccess->save();
    }

}
