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

        $addApprovalSetupAccess = UserAccess::findOrNew(931);

        $addApprovalSetupAccess->UA_FK_Module_id = 283;
        $addApprovalSetupAccess->UA_AccessName   = 'Liquidate';
        $addApprovalSetupAccess->UA_Trigger      = 'financial-management/revolving-fund-voucher/liquidate';
        $addApprovalSetupAccess->UA_Icon         = "glyphicon-book";
        $addApprovalSetupAccess->UA_Access_id    = 931;
        $addApprovalSetupAccess->UA_Outside      = 1;
        $addApprovalSetupAccess->UA_Inline       = 1;
        $addApprovalSetupAccess->UA_Get          = 1;

        $addApprovalSetupAccess->save();
    }

}
