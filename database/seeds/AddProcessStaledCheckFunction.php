<?php

use App\Models\Module\ModuleFunction;
use Illuminate\Database\Seeder;

/**
 * php artisan db:seed --class=AddProcessStaledCheckFunction
 */
class AddProcessStaledCheckFunction extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        ModuleFunction::$strictAuditGeneration = false;

        $cancelCVAPVFunction = ModuleFunction::findOrNew(218);

        $cancelCVAPVFunction->F_Function_id  = 218;
        $cancelCVAPVFunction->F_FunctionName = 'Process Staled Check';
        $cancelCVAPVFunction->F_FK_Module_id = 53;
        $cancelCVAPVFunction->F_Order_id     = 10;
        $cancelCVAPVFunction->F_Trigger      = 'process-staled-check';
        $cancelCVAPVFunction->F_Inside       = 0;
        $cancelCVAPVFunction->F_Outside      = 1;

        $cancelCVAPVFunction->save();
    }

}
