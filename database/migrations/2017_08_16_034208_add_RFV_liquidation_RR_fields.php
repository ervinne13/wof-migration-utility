<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRFVLiquidationRRFields extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            // Schema::table('tblACC_RFV', function ($table) {
            //     if (!Schema::hasColumn('tblACC_RFV', 'RFV_RRBased')) {
            //         $table->boolean('RFV_RRBased')->default(false);
            //     }
            // });

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

            // Schema::table('tblACC_RFV', function ($table) {
            //     if (!Schema::hasColumn('tblACC_RFV', 'RFV_RRBased')) {
            //         $table->dropColumn('RFV_RRBased');
            //     }
            // });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
