<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInitialAcquisitionCostAccount extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblACC_FAPostingGroup', function ($table) {

                if (!Schema::hasColumn('tblACC_FAPostingGroup', 'FAPG_COA_FK_IACANo')) {
                    $table->string('FAPG_COA_FK_IACANo', 32)->nullable();
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

            Schema::table('tblACC_FAPostingGroup', function ($table) {

                if (Schema::hasColumn('tblACC_FAPostingGroup', 'FAPG_COA_FK_IACANo')) {
                    $table->dropColumn('FAPG_COA_FK_IACANo');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
