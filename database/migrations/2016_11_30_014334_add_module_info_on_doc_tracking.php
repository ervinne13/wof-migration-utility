<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddModuleInfoOnDocTracking extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();
            DB::statement('TRUNCATE "tblCOM_DocTracking" cascade;');

            Schema::table('tblCOM_DocTracking', function ($table) {
                $table->string('DT_ConsolidatedDocNo', 30);
                $table->string('DT_ApprovalSetupName', 30);
                $table->bigInteger('DT_ModuleId');
            });

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
            DB::statement('TRUNCATE "tblCOM_DocTracking" cascade;');

            Schema::table('tblCOM_DocTracking', function ($table) {
                $table->dropColumn('DT_ConsolidatedDocNo');
                $table->dropColumn('DT_ApprovalSetupName');
                $table->dropColumn('DT_ModuleId');
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
