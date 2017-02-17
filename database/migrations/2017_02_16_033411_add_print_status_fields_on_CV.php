<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPrintStatusFieldsOnCV extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblACC_CVHeader', function ($table) {

                if (!Schema::hasColumn('tblACC_CVHeader', 'CV_CheckPrintedBy')) {
                    $table->string('CV_CheckPrintedBy', 30)->nullable();
                }

                if (!Schema::hasColumn('tblACC_CVHeader', 'CV_CVPrintedBy')) {
                    $table->string('CV_CVPrintedBy', 30)->nullable();
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

            Schema::table('tblACC_CVHeader', function ($table) {

                if (Schema::hasColumn('tblACC_CVHeader', 'CV_CheckPrintedBy')) {
                    $table->dropColumn('CV_CheckPrintedBy');
                }

                if (Schema::hasColumn('tblACC_CVHeader', 'CV_CVPrintedBy')) {
                    $table->dropColumn('CV_CVPrintedBy');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
