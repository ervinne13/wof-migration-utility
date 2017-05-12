<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCountsheetDetailSeriesJson extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_PCountSheetDetails', function ($table) {

                if (!Schema::hasColumn('tblINV_PCountSheetDetails', 'CSD_SeriesJSON')) {
                    $table->json('CSD_SeriesJSON')->nullable();
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

            Schema::table('tblINV_PCountSheetDetails', function ($table) {

                if (Schema::hasColumn('tblINV_PCountSheetDetails', 'CSD_SeriesJSON')) {
                    $table->dropColumn('CSD_SeriesJSON');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
