<?php

use App\Models\Module\Module;
use App\Models\UserAccess;
use Illuminate\Database\Seeder;

/**
 * php artisan db:seed --class=TCostSetupModulesSeeder
 */
class TCostSetupModulesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->createConditionFactor();
        $this->createMarketPrice();
    }

    private function createConditionFactor() {
        $module = Module::where(["M_Description" => "Condition Factor"])->first();

        if (!$module) {
            $module = new Module();
        }

        $module->M_Description  = "Condition Factor";
        $module->M_Parent       = 21; // Application Setup/Inventory
        $module->M_Trigger      = "administration/condition-factor";
        $module->M_Module_id    = 324;
        $module->M_Level        = 2;
        $module->M_Icon         = '';
        $module->M_Active       = 1;
        $module->M_Replicate    = 0;
        $module->M_Header       = 0;
        $module->M_WithApproval = 0;

        $module->save();

        $viewAccess = UserAccess::findOrNew(923);
        $viewAccess->fill(["UA_FK_Module_id" => $module->M_Module_id, "UA_AccessName" => "View", "UA_Access_id" => 923, "UA_Trigger" => "", "UA_Icon" => '']);
        $viewAccess->save();

        $addAccess = UserAccess::findOrNew(924);
        $addAccess->fill(["UA_FK_Module_id" => $module->M_Module_id, "UA_AccessName" => "Add", "UA_Access_id" => 924, "UA_Trigger" => "administration/condition-factor/add", "UA_Icon" => 'glyphicon-plus', "UA_Outside" => 1, "UA_Header" => 1]);
        $addAccess->save();

        $editAccess = UserAccess::findOrNew(925);
        $editAccess->fill(["UA_FK_Module_id" => $module->M_Module_id, "UA_AccessName" => "Edit", "UA_Access_id" => 925, "UA_Trigger" => "administration/condition-factor/update", "UA_Icon" => 'glyphicon-edit', "UA_Outside" => 1, "UA_Inline" => 1, "UA_Get" => 1]);
        $editAccess->save();
    }

    private function createMarketPrice() {
        $module = Module::where(["M_Description" => "Market Price"])->first();

        if (!$module) {
            $module = new Module();
        }

        $module->M_Description  = "Market Price";
        $module->M_Parent       = 21; // Application Setup/Inventory
        $module->M_Trigger      = "administration/market-price";
        $module->M_Module_id    = 325;
        $module->M_Level        = 2;
        $module->M_Icon         = '';
        $module->M_Active       = 1;
        $module->M_Replicate    = 0;
        $module->M_Header       = 0;
        $module->M_WithApproval = 0;

        $module->save();

        $viewAccess = UserAccess::findOrNew(926);
        $viewAccess->fill(["UA_FK_Module_id" => $module->M_Module_id, "UA_AccessName" => "View", "UA_Access_id" => 926, "UA_Trigger" => "", "UA_Icon" => '']);
        $viewAccess->save();

        $addAccess = UserAccess::findOrNew(927);
        $addAccess->fill(["UA_FK_Module_id" => $module->M_Module_id, "UA_AccessName" => "Add", "UA_Access_id" => 927, "UA_Trigger" => "administration/market-price/add", "UA_Icon" => 'glyphicon-plus', "UA_Outside" => 1, "UA_Header" => 1]);
        $addAccess->save();

        $editAccess = UserAccess::findOrNew(928);
        $editAccess->fill(["UA_FK_Module_id" => $module->M_Module_id, "UA_AccessName" => "Edit", "UA_Access_id" => 928, "UA_Trigger" => "administration/market-price/update", "UA_Icon" => 'glyphicon-edit', "UA_Outside" => 1, "UA_Inline" => 1, "UA_Get" => 1]);
        $editAccess->save();
    }

}
