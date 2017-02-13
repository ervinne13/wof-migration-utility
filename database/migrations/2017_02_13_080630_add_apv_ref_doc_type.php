<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddApvRefDocType extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblACC_APVHeader', function ($table) {

                if (!Schema::hasColumn('tblACC_APVHeader', 'APV_RefDocType')) {
                    $table->string('APV_RefDocType', 30)->nullable();
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

            Schema::table('tblACC_APVHeader', function ($table) {

                if (Schema::hasColumn('tblACC_APVHeader', 'RPH_VAT')) {
                    $table->dropColumn('APV_RefDocType');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
