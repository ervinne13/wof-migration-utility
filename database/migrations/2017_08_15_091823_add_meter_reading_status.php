<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMeterReadingStatus extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_RetrievalMeterReading', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalMeterReading', 'RVMR_Status')) {
                    $table->string('RVMR_Status', 30)->nullable();
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

            Schema::table('tblINV_RetrievalMeterReading', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalMeterReading', 'RVMR_Status')) {
                    $table->dropColumn('RVMR_Status');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
