<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddTransferCostComputationFieldsInTO extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblCOM_TODetail', function ($table) {

                if (!Schema::hasColumn('tblCOM_TODetail', 'TOD_ActualLengthOfUse')) {
                    $table->integer('TOD_ActualLengthOfUse')->nullable();
                }

                if (!Schema::hasColumn('tblCOM_TODetail', 'TOD_ConditionFactor')) {
                    $table->decimal('TOD_ConditionFactor', 30, 12)->nullable();
                }

                if (!Schema::hasColumn('tblCOM_TODetail', 'TOD_MarketPrice')) {
                    $table->decimal('TOD_MarketPrice', 10, 4)->nullable();
                }

                if (!Schema::hasColumn('tblCOM_TODetail', 'TOD_ApprovedTransferCost')) {
                    $table->decimal('TOD_ApprovedTransferCost', 10, 4)->nullable();
                }

                if (!Schema::hasColumn('tblCOM_TODetail', 'TOD_ApprovedTransferCostRemarks')) {
                    $table->string('TOD_ApprovedTransferCostRemarks', 100)->nullable();
                }

                if (!Schema::hasColumn('tblCOM_TODetail', 'TOD_WithServiceVehichleRequest')) {
                    $table->boolean('TOD_WithServiceVehichleRequest')->default(false);
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

                if (Schema::hasColumn('tblCOM_TODetail', 'TOD_ActualLengthOfUse')) {
                    $table->dropColumn('TOD_ActualLengthOfUse');
                }

                if (Schema::hasColumn('tblCOM_TODetail', 'TOD_ConditionFactor')) {
                    $table->dropColumn('TOD_ConditionFactor');
                }

                if (Schema::hasColumn('tblCOM_TODetail', 'TOD_MarketPrice')) {
                    $table->dropColumn('TOD_MarketPrice');
                }

                if (Schema::hasColumn('tblCOM_TODetail', 'TOD_ApprovedTransferCost')) {
                    $table->dropColumn('TOD_ApprovedTransferCost');
                }

                if (Schema::hasColumn('tblCOM_TODetail', 'TOD_ApprovedTransferCostRemarks')) {
                    $table->dropColumn('TOD_ApprovedTransferCostRemarks');
                }

                if (Schema::hasColumn('tblCOM_TODetail', 'TOD_WithServiceVehichleRequest')) {
                    $table->dropColumn('TOD_WithServiceVehichleRequest');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
