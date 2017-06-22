<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRtvFinalizeFields extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_Retrieval', function ($table) {
                if (!Schema::hasColumn('tblINV_Retrieval', 'RV_FinalizedWeekNo')) {
                    $table->integer('RV_FinalizedWeekNo')->default(0);
                }

                if (!Schema::hasColumn('tblINV_Retrieval', 'RV_CurrentPartialWeekDate')) {
                    $table->timestamp('RV_CurrentPartialWeekDate')->nullable();
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

            Schema::table('tblINV_Retrieval', function ($table) {
                if (Schema::hasColumn('tblINV_Retrieval', 'RV_FinalizedWeekNo')) {
                    $table->dropColumn('RV_FinalizedWeekNo');
                }

                if (Schema::hasColumn('tblINV_Retrieval', 'RV_CurrentPartialWeekDate')) {
                    $table->dropColumn('RV_CurrentPartialWeekDate');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
