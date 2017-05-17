<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTransferToSubLocationInTO extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblCOM_TODetail', function ($table) {

                if (!Schema::hasColumn('tblCOM_TODetail', 'TOD_TransferFromSubLocation')) {
                    $table->string('TOD_TransferFromSubLocation', 30);
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

            Schema::table('tblCOM_TODetail', function ($table) {

                if (Schema::hasColumn('tblCOM_TODetail', 'TOD_TransferFromSubLocation')) {
                    $table->dropColumn('TOD_TransferFromSubLocation');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
