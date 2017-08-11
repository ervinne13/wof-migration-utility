<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRFVRunningBalanceField extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblACC_RFV', function ($table) {
                if (!Schema::hasColumn('tblACC_RFV', 'RFV_SourceOfFundRemainingBalance')) {
                    $table->decimal('RFV_SourceOfFundRemainingBalance', 12, 4)->nullable();
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
                if (!Schema::hasColumn('tblACC_RFV', 'RFV_SourceOfFundRemainingBalance')) {
                    $table->dropColumn('RFV_SourceOfFundRemainingBalance');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
