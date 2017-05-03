<?php

use App\Models\Module\ModuleFunction;
use Illuminate\Database\Seeder;

/**
 * php artisan db:seed --class=UnreleaseFunctionSeeder
 */
class UnreleaseFunctionSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        ModuleFunction::$strictAuditGeneration = false;

        $postDCMFunction = ModuleFunction::findOrNew(212);

        $postDCMFunction->F_Function_id  = 212;
        $postDCMFunction->F_FunctionName = 'Unrelease CV';
        $postDCMFunction->F_FK_Module_id = 53;
        $postDCMFunction->F_Order_id     = 9;
        $postDCMFunction->F_Trigger      = 'unrelease-cv';
        $postDCMFunction->F_Inside       = 0;
        $postDCMFunction->F_Outside      = 1;

        $postDCMFunction->save();
    }

}
