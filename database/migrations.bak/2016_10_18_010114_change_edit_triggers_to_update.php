<?php

use App\Models\UserAccess;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ChangeEditTriggersToUpdate extends Migration {

    protected $modulesWithEditTrigger = [
        45, 46, 54, 125, 211, 287, 288, 298, 299
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        try {
            DB::beginTransaction();

            foreach ($this->modulesWithEditTrigger AS $moduleId) {
                $userAccess      = UserAccess::editAccessOfModule($moduleId)->first();
                $splittedTrigger = explode('/', $userAccess->UA_Trigger);

                //  change the last member (should be edit) to update
                $splittedTrigger[count($splittedTrigger) - 1] = "update";

                $userAccess->UA_Trigger = join('/', $splittedTrigger);
                $userAccess->save();
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        try {
            DB::beginTransaction();
            foreach ($this->modulesWithEditTrigger AS $moduleId) {
                $userAccess      = UserAccess::editAccessOfModule($moduleId)->first();
                $splittedTrigger = explode('/', $userAccess->UA_Trigger);

                //  change the last member (should be update) to edit
                $splittedTrigger[count($splittedTrigger) - 1] = "edit";

                $userAccess->UA_Trigger = join('/', $splittedTrigger);
                $userAccess->save();
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
