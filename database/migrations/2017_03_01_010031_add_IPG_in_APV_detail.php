<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIPGInAPVDetail extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblACC_APVDetail', function ($table) {

                if (!Schema::hasColumn('tblACC_APVDetail', 'APVD_IPG')) {
                    $table->string('APVD_IPG', 30)->nullable();
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

            Schema::table('tblACC_APVDetail', function ($table) {

                if (Schema::hasColumn('tblACC_APVDetail', 'APVD_IPG')) {
                    $table->dropColumn('APVD_IPG');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
