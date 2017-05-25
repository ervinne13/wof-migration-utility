<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTOLDConverted extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblCOM_TOLDetail', function ($table) {

                if (!Schema::hasColumn('tblCOM_TOLDetail', 'TOLD_Converted')) {
                    $table->boolean('TOLD_Converted')->default(false);
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

            Schema::table('tblCOM_TOLDetail', function ($table) {

                if (Schema::hasColumn('tblCOM_TOLDetail', 'TOLD_Converted')) {
                    $table->dropColumn('TOLD_Converted');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
