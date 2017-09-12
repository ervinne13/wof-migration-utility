<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCvDisplayStatus extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblACC_CVHeader', function ($table) {
                if (!Schema::hasColumn('tblACC_CVHeader', 'CV_DisplayStatus')) {
                    $table->string('CV_DisplayStatus', 30)->nullable();
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
                if (!Schema::hasColumn('tblACC_CVHeader', 'CV_DisplayStatus')) {
                    $table->dropColumn('CV_DisplayStatus');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
