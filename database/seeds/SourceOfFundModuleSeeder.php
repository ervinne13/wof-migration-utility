<?php

use App\Models\Module\Module;
use App\Models\SourceOfFund;
use App\Models\UserAccess;
use Illuminate\Database\Seeder;

class SourceOfFundModuleSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        // <editor-fold defaultstate="collapsed" desc="Default SOF Entries">

        $pcf                = SourceOfFund::findOrNew("Petty Cash Fund");
        $pcf->SOF_Name      = "Petty Cash Fund";
        $pcf->SOF_GLAccount = 101001;
        $pcf->CreatedBy     = 'gregori';
        $pcf->DateCreated   = date('Y-m-d');
        $pcf->ModifiedBy    = 'gregori';
        $pcf->DateModified  = date('Y-m-d');
        $pcf->save();

        $lpf                = SourceOfFund::findOrNew("Low Point Fund");
        $lpf->SOF_Name      = "Low Point Fund";
        $lpf->SOF_GLAccount = 101001;
        $lpf->CreatedBy     = 'gregori';
        $lpf->DateCreated   = date('Y-m-d');
        $lpf->ModifiedBy    = 'gregori';
        $lpf->DateModified  = date('Y-m-d');
        $lpf->save();

        $rf                = SourceOfFund::findOrNew("Repair Fund");
        $rf->SOF_Name      = "Repair Fund";
        $rf->SOF_GLAccount = 101001;
        $rf->CreatedBy     = 'gregori';
        $rf->DateCreated   = date('Y-m-d');
        $rf->ModifiedBy    = 'gregori';
        $rf->DateModified  = date('Y-m-d');
        $rf->save();

        // </editor-fold>
        // <editor-fold defaultstate="collapsed" desc="SOF Module & Access Entries">       

        $module = Module::where(["M_Description" => "Source of Fund"])->first();

        if (!$module) {
            $module = new Module();
        }

        $module->M_Description  = "Source of Fund";
        $module->M_Parent       = 255; // Accounting
        $module->M_Trigger      = "administration/source-of-fund";
        $module->M_Module_id    = 311;
        $module->M_Level        = 2;
        $module->M_Icon         = '';
        $module->M_Active       = 1;
        $module->M_Replicate    = 0;
        $module->M_Header       = 1;
        $module->M_WithApproval = 0;

        $module->save();

        $viewAccess = UserAccess::findOrNew(865);
        $viewAccess->fill(["UA_FK_Module_id" => 311, "UA_AccessName" => "View", "UA_Access_id" => 865, "UA_Trigger" => "", "UA_Icon" => '']);
        $viewAccess->save();

        $addAccess = UserAccess::findOrNew(866);
        $addAccess->fill(["UA_FK_Module_id" => 311, "UA_AccessName" => "Add", "UA_Access_id" => 866, "UA_Trigger" => "administration/source-of-fund/add", "UA_Icon" => 'glyphicon-plus', "UA_Outside" => 1, "UA_Header" => 1]);
        $addAccess->save();

        $editAccess = UserAccess::findOrNew(867);
        $editAccess->fill(["UA_FK_Module_id" => 311, "UA_AccessName" => "Edit", "UA_Access_id" => 867, "UA_Trigger" => "administration/source-of-fund/update", "UA_Icon" => 'glyphicon-edit', "UA_Outside" => 1, "UA_Inline" => 1, "UA_Get" => 1]);
        $editAccess->save();

        // </editor-fold>
    }

}
