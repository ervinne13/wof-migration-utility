<?php

use App\Models\Module\Module;
use Illuminate\Database\Seeder;

class AddSourceOfFundModuleSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $module = Module::find(335);

        if (!$module) {
            $module = new Module();
        }

        $module->M_Description  = "Source of Fund";
        $module->M_Parent       = 9; // User and Approval Setup
        $module->M_Trigger      = "administration/source-of-fund";
        $module->M_Module_id    = 335;
        $module->M_Level        = 2;
        $module->M_Icon         = '';
        $module->M_Active       = 1;
        $module->M_Replicate    = 0;
        $module->M_Header       = 0;
        $module->M_WithApproval = 0;

        $module->save();
    }

}
