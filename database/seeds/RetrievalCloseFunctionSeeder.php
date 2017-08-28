<?php

use App\Models\Module\ModuleFunction;
use Illuminate\Database\Seeder;

//php artisan db:seed --class=RetrievalCloseFunctionSeeder
class RetrievalCloseFunctionSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        ModuleFunction::$strictAuditGeneration = false;

        $cancelCVAPVFunction = ModuleFunction::findOrNew(331);

        $cancelCVAPVFunction->F_Function_id  = 331;
        $cancelCVAPVFunction->F_FunctionName = 'Close Retrieval';
        $cancelCVAPVFunction->F_FK_Module_id = 287;
        $cancelCVAPVFunction->F_Order_id     = 10;
        $cancelCVAPVFunction->F_Trigger      = 'close-retrieval';
        $cancelCVAPVFunction->F_Inside       = 1;
        $cancelCVAPVFunction->F_Outside      = 0;

        $cancelCVAPVFunction->save();
    }

}
