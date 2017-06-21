<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusOnItemSeries extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_ItemSeriesStock', function ($table) {
                if (!Schema::hasColumn('tblINV_ItemSeriesStock', 'ISS_Status')) {
                    $table->string('ISS_Status', 30)->default('On Hand');
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

            Schema::table('tblINV_ItemSeriesStock', function ($table) {
                if (Schema::hasColumn('tblINV_ItemSeriesStock', 'ISS_Status')) {
                    $table->dropColumn('ISS_Status');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
