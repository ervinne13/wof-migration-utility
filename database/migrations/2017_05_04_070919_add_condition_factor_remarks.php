<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConditionFactorRemarks extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblCOM_TODetail', function ($table) {

                if (!Schema::hasColumn('tblCOM_TODetail', 'TOD_ConditionFactorRemarks')) {
                    $table->string('TOD_ConditionFactorRemarks')->nullable();
                }
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

            Schema::table('tblCOM_TODetail', function ($table) {

                if (Schema::hasColumn('tblCOM_TODetail', 'TOD_ConditionFactorRemarks')) {
                    $table->dropColumn('TOD_ConditionFactorRemarks');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
