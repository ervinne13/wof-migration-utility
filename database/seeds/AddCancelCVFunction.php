<?php

use App\Models\Module\ModuleFunction;
use Illuminate\Database\Seeder;

/**
 * php artisan db:seed --class=AddCancelCVFunction
 */
class AddCancelCVFunction extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        ModuleFunction::$strictAuditGeneration = false;

        $cancelCVAPVFunction = ModuleFunction::findOrNew(220);

        $cancelCVAPVFunction->F_Function_id  = 220;
        $cancelCVAPVFunction->F_FunctionName = 'Cancel CV';
        $cancelCVAPVFunction->F_FK_Module_id = 53;
        $cancelCVAPVFunction->F_Order_id     = 9;
        $cancelCVAPVFunction->F_Trigger      = 'cancel-cv';
        $cancelCVAPVFunction->F_Inside       = 1;
        $cancelCVAPVFunction->F_Outside      = 0;

        $cancelCVAPVFunction->save();
    }

}
