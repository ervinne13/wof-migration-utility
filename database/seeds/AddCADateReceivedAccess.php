<?php

use App\Models\Module\ModuleFunction;
use App\Models\UserAccess;
use Illuminate\Database\Seeder;

/**
 * php artisan db:seed --class=AddCADateReceivedAccess
 */
class AddCADateReceivedAccess extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        ModuleFunction::$strictAuditGeneration = false;

        $dateReceivedAccess = UserAccess::findOrNew(932);

        $dateReceivedAccess->UA_FK_Module_id = 63;
        $dateReceivedAccess->UA_AccessName   = 'Save Date Received';
        $dateReceivedAccess->UA_Trigger      = '';
        $dateReceivedAccess->UA_Icon         = "glyphicon-book";
        $dateReceivedAccess->UA_Access_id    = 932;
        $dateReceivedAccess->UA_Outside      = 0;
        $dateReceivedAccess->UA_Inline       = 0;
        $dateReceivedAccess->UA_Get          = 0;

        $dateReceivedAccess->save();
    }

}
