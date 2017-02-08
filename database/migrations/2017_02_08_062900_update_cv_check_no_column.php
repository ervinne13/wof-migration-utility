<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateCvCheckNoColumn extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblACC_CVHeader', function (Blueprint $table) {
                $table->dropColumn('CV_CheckNo');
            });

            Schema::table('tblACC_CVHeader', function (Blueprint $table) {
                $table->string('CV_CheckNo', 30)->nullable();
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

            Schema::table('tblACC_CVHeader', function (Blueprint $table) {
                $table->dropColumn('CV_CheckNo');
            });

            Schema::table('tblACC_CVHeader', function (Blueprint $table) {
                $table->bigInteger('CV_CheckNo');
            });
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
