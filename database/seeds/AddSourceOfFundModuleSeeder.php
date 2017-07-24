<?php

use App\Models\Module\Module;
use App\Models\UserAccess;
use Illuminate\Database\Seeder;

class AddSourceOfFundModuleSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $sourceOfFundModuleId = 335;

        $module = Module::find($sourceOfFundModuleId);

        if (!$module) {
            $module = new Module();
        }

        $module->M_Description  = "Source of Fund";
        $module->M_Parent       = 255; // Accounting
        $module->M_Trigger      = "administration/source-of-fund";
        $module->M_Module_id    = $sourceOfFundModuleId;
        $module->M_Level        = 2;
        $module->M_Icon         = '';
        $module->M_Active       = 1;
        $module->M_Replicate    = 0;
        $module->M_Header       = 0;
        $module->M_WithApproval = 0;

        $module->save();

        $addAccess = UserAccess::findOrNew(956);

        $addAccess->UA_FK_Module_id = $sourceOfFundModuleId;
        $addAccess->UA_AccessName   = 'Add';
        $addAccess->UA_Trigger      = 'administration/source-of-fund/add';
        $addAccess->UA_Icon         = "glyphicon-plus";
        $addAccess->UA_Access_id    = 956;
        $addAccess->UA_Outside      = 1;
        $addAccess->UA_Inside       = 0;
        $addAccess->UA_Inline       = 0;
        $addAccess->UA_Header       = 1;
        $addAccess->UA_Get          = 1;

        $addAccess->save();
        $editAccess = UserAccess::findOrNew(957);

        $editAccess->UA_FK_Module_id = $sourceOfFundModuleId;
        $editAccess->UA_AccessName   = 'Add';
        $editAccess->UA_Trigger      = 'administration/source-of-fund/edit';
        $editAccess->UA_Icon         = "glyphicon-edit";
        $editAccess->UA_Access_id    = 957;
        $editAccess->UA_Outside      = 1;
        $editAccess->UA_Inside       = 0;
        $editAccess->UA_Inline       = 1;
        $editAccess->UA_Header       = 0;
        $editAccess->UA_Get          = 1;

        $editAccess->save();

        $viewAccess = UserAccess::findOrNew(958);

        $viewAccess->UA_FK_Module_id = $sourceOfFundModuleId;
        $viewAccess->UA_AccessName   = 'Add';
        $viewAccess->UA_Trigger      = 'administration/source-of-fund/view';
        $viewAccess->UA_Icon         = "glyphicon-search";
        $viewAccess->UA_Access_id    = 958;
        $viewAccess->UA_Outside      = 1;
        $viewAccess->UA_Inside       = 0;
        $viewAccess->UA_Inline       = 1;
        $viewAccess->UA_Header       = 0;
        $viewAccess->UA_Get          = 1;

        $viewAccess->save();
    }

}
