<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRefToTypeToRq extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_RQDetail', function ($table) {

                if (!Schema::hasColumn('tblINV_RQDetail', 'RQD_RefToType')) {
                    $table->string('RQD_RefToType', 32)->nullable();
                }

                if (!Schema::hasColumn('tblINV_RQDetail', 'RQD_RefToStatus')) {
                    $table->string('RQD_RefToStatus', 32)->nullable();
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

            Schema::table('tblINV_RQDetail', function ($table) {

                if (Schema::hasColumn('tblINV_RQDetail', 'RQD_RefToType')) {
                    $table->dropColumn('RQD_RefToType');
                }

                if (Schema::hasColumn('tblINV_RQDetail', 'RQD_RefToStatus')) {
                    $table->dropColumn('RQD_RefToStatus');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
