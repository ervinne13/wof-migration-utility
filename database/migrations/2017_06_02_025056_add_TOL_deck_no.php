<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTOLDeckNo extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblCOM_TOL', function ($table) {

                if (!Schema::hasColumn('tblCOM_TOL', 'TOL_TransferToDeckNo')) {
                    $table->integer('TOL_TransferToDeckNo')->nullable();
                }

                if (!Schema::hasColumn('tblCOM_TOL', 'TOL_TransferFromDeckNo')) {
                    $table->integer('TOL_TransferFromDeckNo')->nullable();
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

            Schema::table('tblCOM_TOL', function ($table) {

                if (Schema::hasColumn('tblCOM_TOL', 'TOL_TransferToDeckNo')) {
                    $table->dropColumn('TOL_TransferToDeckNo');
                }

                if (Schema::hasColumn('tblCOM_TOL', 'TOL_TransferFromDeckNo')) {
                    $table->dropColumn('TOL_TransferFromDeckNo');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
