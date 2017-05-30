<?php

use App\Models\Module\ModuleFunction;
use Illuminate\Database\Seeder;

//  php artisan db:seed --class=AddFinalizeFunctionsForPDI
class AddFinalizeFunctionsForPDI extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //301

        ModuleFunction::$strictAuditGeneration = false;

        $finalizePD = ModuleFunction::findOrNew(222);

        $finalizePD->F_Function_id  = 222;
        $finalizePD->F_FunctionName = 'Finalize PD';
        $finalizePD->F_FK_Module_id = 301;
        $finalizePD->F_Order_id     = 8;
        $finalizePD->F_Trigger      = 'finalize-pd';
        $finalizePD->F_Inside       = 0;
        $finalizePD->F_Outside      = 1;

        $finalizePD->save();

        $finalizeTickets = ModuleFunction::findOrNew(223);

        $finalizeTickets->F_Function_id  = 223;
        $finalizeTickets->F_FunctionName = 'Finalize Tickets';
        $finalizeTickets->F_FK_Module_id = 301;
        $finalizeTickets->F_Order_id     = 9;
        $finalizeTickets->F_Trigger      = 'finalize-tickets';
        $finalizeTickets->F_Inside       = 0;
        $finalizeTickets->F_Outside      = 1;

        $finalizeTickets->save();
    }

}
