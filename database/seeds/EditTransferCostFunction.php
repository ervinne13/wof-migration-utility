<?php

use App\Models\Module\ModuleFunction;
use Illuminate\Database\Seeder;

/**
 * php artisan db:seed --class=EditTransferCostFunction
 */
class EditTransferCostFunction extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        ModuleFunction::$strictAuditGeneration = false;

        $postAMLFunction = ModuleFunction::findOrNew(217);

        $postAMLFunction->F_Function_id  = 217;
        $postAMLFunction->F_FunctionName = 'Edit Approved Transfer Cost';
        $postAMLFunction->F_FK_Module_id = 96;
        $postAMLFunction->F_Order_id     = 10;
        $postAMLFunction->F_Trigger      = 'edit-approved-t-cost';
        $postAMLFunction->F_Inside       = 1;
        $postAMLFunction->F_Outside      = 0;

        $postAMLFunction->save();
    }

}
