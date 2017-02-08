<?php

use App\Models\Module\ModuleFunction;
use Illuminate\Database\Seeder;

class UnclearFunctionSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        ModuleFunction::$strictAuditGeneration = false;

        $postDCMFunction = ModuleFunction::findOrNew(207);

        $postDCMFunction->F_Function_id  = 208;
        $postDCMFunction->F_FunctionName = 'Unclear CV';
        $postDCMFunction->F_FK_Module_id = 53;
        $postDCMFunction->F_Order_id     = 10;
        $postDCMFunction->F_Trigger      = 'unclear-cv';
        $postDCMFunction->F_Inside       = 0;
        $postDCMFunction->F_Outside      = 1;

        $postDCMFunction->save();
    }

}
