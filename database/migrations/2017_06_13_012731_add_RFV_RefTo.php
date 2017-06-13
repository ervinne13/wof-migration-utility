<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRFVRefTo extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblACC_RFV', function ($table) {

                if (!Schema::hasColumn('tblACC_RFV', 'RFV_RefTo')) {
                    $table->string('RFV_RefTo', 30)->nullable();
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

            Schema::table('tblACC_RFV', function ($table) {
                if (Schema::hasColumn('tblACC_RFV', 'RFV_RefTo')) {
                    $table->dropColumn('RFV_RefTo');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
