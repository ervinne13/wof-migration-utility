<?php

use App\Models\Module\ModuleFunction;
use Illuminate\Database\Seeder;

/**
 * php artisan db:seed --class=AddIssuanceAndReturnsClosingFunctions
 */
class AddIssuanceAndReturnsClosingFunctions extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        ModuleFunction::$strictAuditGeneration = false;

        $finalizePD = ModuleFunction::findOrNew(224);

        $finalizePD->F_Function_id  = 224;
        $finalizePD->F_FunctionName = 'Save & Close Issuance';
        $finalizePD->F_FK_Module_id = 288;
        $finalizePD->F_Order_id     = 10;
        $finalizePD->F_Trigger      = 'close-issuance';
        $finalizePD->F_Inside       = 1;
        $finalizePD->F_Outside      = 0;

        $finalizePD->save();

        $finalizeTickets = ModuleFunction::findOrNew(225);

        $finalizeTickets->F_Function_id  = 225;
        $finalizeTickets->F_FunctionName = 'Save & Close Returns';
        $finalizeTickets->F_FK_Module_id = 290;
        $finalizeTickets->F_Order_id     = 10;
        $finalizeTickets->F_Trigger      = 'close-returns';
        $finalizeTickets->F_Inside       = 1;
        $finalizeTickets->F_Outside      = 0;

        $finalizeTickets->save();
    }

}
