<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIssuanceAdjFields extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_IssuanceDetailDuodecuple', function ($table) {

                if (!Schema::hasColumn('tblINV_IssuanceDetailDuodecuple', 'ISD_Adjustment')) {
                    $table->bigInteger('ISD_Adjustment')->default(0);
                }

                if (!Schema::hasColumn('tblINV_IssuanceDetailDuodecuple', 'ISD_AdjustmentRemarks')) {
                    $table->string('ISD_AdjustmentRemarks')->nullable();
                }

                if (!Schema::hasColumn('tblINV_IssuanceDetailDuodecuple', 'ISD_AdjustedBy')) {
                    $table->string('ISD_AdjustedBy', 30)->nullable();
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

            Schema::table('tblINV_IssuanceDetailDuodecuple', function ($table) {
                if (Schema::hasColumn('tblINV_IssuanceDetailDuodecuple', 'ISD_Adjustment')) {
                    $table->dropColumn('ISD_Adjustment');
                }

                if (Schema::hasColumn('tblINV_IssuanceDetailDuodecuple', 'ISD_AdjustmentRemarks')) {
                    $table->dropColumn('ISD_AdjustmentRemarks');
                }

                if (Schema::hasColumn('tblINV_IssuanceDetailDuodecuple', 'ISD_AdjustedBy')) {
                    $table->dropColumn('ISD_AdjustedBy');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
