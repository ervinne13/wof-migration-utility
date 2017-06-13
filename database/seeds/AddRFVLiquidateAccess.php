<?php

use App\Models\Module\ModuleFunction;
use App\Models\UserAccess;
use Illuminate\Database\Seeder;

/**
 * php artisan db:seed --class=AddRFVLiquidateAccess
 */
class AddRFVLiquidateAccess extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        ModuleFunction::$strictAuditGeneration = false;

        $liquidateAccess = UserAccess::findOrNew(931);

        $liquidateAccess->UA_FK_Module_id = 283;
        $liquidateAccess->UA_AccessName   = 'Liquidate';
        $liquidateAccess->UA_Trigger      = 'financial-management/revolving-fund-voucher/liquidate';
        $liquidateAccess->UA_Icon         = "glyphicon-book";
        $liquidateAccess->UA_Access_id    = 931;
        $liquidateAccess->UA_Outside      = 1;
        $liquidateAccess->UA_Inline       = 1;
        $liquidateAccess->UA_Get          = 1;

        $liquidateAccess->save();

        $postFuntion = ModuleFunction::findOrNew(226);

        $postFuntion->F_Function_id  = 226;
        $postFuntion->F_FunctionName = 'Post';
        $postFuntion->F_FK_Module_id = 283;
        $postFuntion->F_Order_id     = 10;
        $postFuntion->F_Trigger      = 'post';
        $postFuntion->F_Inside       = 1;
        $postFuntion->F_Outside      = 0;

        $postFuntion->save();
    }

}
