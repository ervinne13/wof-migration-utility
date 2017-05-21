<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTransferDestinationType extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblCOM_TOL', function ($table) {

                if (!Schema::hasColumn('tblCOM_TOL', 'TOL_TransferToType')) {
                    $table->string('TOL_TransferToType', 30)->nullable();
                }

                if (!Schema::hasColumn('tblCOM_TOL', 'TOL_TransferToMachineAssetID')) {
                    $table->string('TOL_TransferToMachineAssetID', 30)->nullable();
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

                if (Schema::hasColumn('tblCOM_TOL', 'TOL_TransferToType')) {
                    $table->dropColumn('TOL_TransferToType');
                }

                if (Schema::hasColumn('tblCOM_TOL', 'TOL_TransferToType')) {
                    $table->dropColumn('TOL_TransferToType');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
