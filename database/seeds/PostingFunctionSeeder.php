<?php

use App\Models\Module\ModuleFunction;
use Illuminate\Database\Seeder;

class PostingFunctionSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        ModuleFunction::$strictAuditGeneration = false;

        $postAMLFunction = ModuleFunction::findOrNew(201);

        $postAMLFunction->F_Function_id  = 201;
        $postAMLFunction->F_FunctionName = 'Post';
        $postAMLFunction->F_FK_Module_id = 52;
        $postAMLFunction->F_Order_id     = 10;
        $postAMLFunction->F_Trigger      = 'post';
        $postAMLFunction->F_Inside       = 1;

        $postAMLFunction->save();

        $postCAFunction = ModuleFunction::findOrNew(202);

        $postCAFunction->F_Function_id  = 202;
        $postCAFunction->F_FunctionName = 'Post';
        $postCAFunction->F_FK_Module_id = 63;
        $postCAFunction->F_Order_id     = 10;
        $postCAFunction->F_Trigger      = 'post';
        $postCAFunction->F_Inside       = 1;

        $postCAFunction->save();

        $postCVFunction = ModuleFunction::findOrNew(203);

        $postCVFunction->F_Function_id  = 203;
        $postCVFunction->F_FunctionName = 'Post';
        $postCVFunction->F_FK_Module_id = 53;
        $postCVFunction->F_Order_id     = 10;
        $postCVFunction->F_Trigger      = 'post';
        $postCVFunction->F_Inside       = 1;

        $postCVFunction->save();

        $postGJFunction = ModuleFunction::findOrNew(204);

        $postGJFunction->F_Function_id  = 204;
        $postGJFunction->F_FunctionName = 'Post';
        $postGJFunction->F_FK_Module_id = 54;
        $postGJFunction->F_Order_id     = 10;
        $postGJFunction->F_Trigger      = 'post';
        $postGJFunction->F_Inside       = 1;

        $postGJFunction->save();

        $postPOFunction = ModuleFunction::findOrNew(205);

        $postPOFunction->F_Function_id  = 205;
        $postPOFunction->F_FunctionName = 'Post to Receive';
        $postPOFunction->F_FK_Module_id = 36;
        $postPOFunction->F_Order_id     = 10;
        $postPOFunction->F_Trigger      = 'post';
        $postPOFunction->F_Inside       = 1;

        $postPOFunction->save();

        $postRPFunction = ModuleFunction::findOrNew(206);

        $postRPFunction->F_Function_id  = 206;
        $postRPFunction->F_FunctionName = 'Post';
        $postRPFunction->F_FK_Module_id = 64;
        $postRPFunction->F_Order_id     = 10;
        $postRPFunction->F_Trigger      = 'post';
        $postRPFunction->F_Inside       = 1;

        $postRPFunction->save();
    }

}
