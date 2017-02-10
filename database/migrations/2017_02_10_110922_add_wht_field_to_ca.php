<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWhtFieldToCa extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblCOM_CA', function ($table) {

                if (!Schema::hasColumn('tblCOM_CA', 'CA_WHT')) {
                    $table->string('CA_WHT', 30)->nullable();
                }
            });

            Schema::table('tblCOM_CALiquidation', function ($table) {

                if (!Schema::hasColumn('tblCOM_CALiquidation', 'CAL_WHT')) {
                    $table->string('CAL_WHT', 30)->nullable();
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

            Schema::table('tblCOM_CA', function ($table) {

                if (Schema::hasColumn('tblCOM_CA', 'CA_WHT')) {
                    $table->dropColumn('CA_WHT');
                }
            });

            Schema::table('tblCOM_CALiquidation', function ($table) {

                if (Schema::hasColumn('tblCOM_CALiquidation', 'CAL_WHT')) {
                    $table->dropColumn('CAL_WHT');
                }
            });
            
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
