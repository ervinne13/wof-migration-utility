<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTOLTransferFromMachineAssetID extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblCOM_TOL', function ($table) {

                if (!Schema::hasColumn('tblCOM_TOL', 'TOL_TransferFromMachineAssetID')) {
                    $table->string('TOL_TransferFromMachineAssetID', 30)->nullable();
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

                if (Schema::hasColumn('tblCOM_TOL', 'TOL_TransferFromMachineAssetID')) {
                    $table->dropColumn('TOL_TransferFromMachineAssetID');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
