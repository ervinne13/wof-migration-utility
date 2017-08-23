<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMeterReadingType extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_RetrievalMeterReading', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalMeterReading', 'RVMR_Type')) {
                    $table->string('RVMR_Type', 30)->nullable();
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
                if (!Schema::hasColumn('tblINV_RetrievalMeterReading', 'RVMR_Type')) {
                    $table->dropColumn('RVMR_Type');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
