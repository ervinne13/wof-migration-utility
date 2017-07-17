<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLiquidationRefFrom extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblACC_RFV', function ($table) {
                if (!Schema::hasColumn('tblACC_RFV', 'RFV_LiquidationRefFrom')) {
                    $table->string('RFV_LiquidationRefFrom', 30)->nullable();
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

            Schema::table('tblACC_RFV', function ($table) {
                if (Schema::hasColumn('tblACC_RFV', 'RFV_LiquidationRefFrom')) {
                    $table->dropColumn('RFV_LiquidationRefFrom');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
