<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCountsheetDetailLocation extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_PCountSheetDetails', function ($table) {

                if (!Schema::hasColumn('tblINV_PCountSheetDetails', 'CSD_Location')) {
                    $table->string('CSD_Location', 30)->nullable();
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

                if (Schema::hasColumn('tblINV_PCountSheetDetails', 'CSD_Location')) {
                    $table->dropColumn('CSD_Location');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
