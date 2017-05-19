<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRqDestinationField extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_RQDetail', function ($table) {

                if (!Schema::hasColumn('tblINV_RQDetail', 'RQD_DestinationModule')) {
                    $table->string('RQD_DestinationModule', 30)->nullable();
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

                if (Schema::hasColumn('tblINV_RQDetail', 'RQD_DestinationModule')) {
                    $table->dropColumn('RQD_DestinationModule');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
