
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStoredInMachine extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_ItemSeries', function ($table) {

                if (!Schema::hasColumn('tblINV_ItemSeries', 'IS_SP_StoredInMachineId')) {
                    $table->string('IS_SP_StoredInMachineId', 30)->nullable();
                }
            });

            Schema::table('tblINV_MachineTickets', function ($table) {

                if (!Schema::hasColumn('tblINV_MachineTickets', 'MCT_ItemNo')) {
                    $table->string('MCT_ItemNo', 30)->nullable();
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

            Schema::table('tblINV_ItemSeries', function ($table) {

                if (Schema::hasColumn('tblINV_ItemSeries', 'IS_SP_StoredInMachineId')) {
                    $table->dropColumn('IS_SP_StoredInMachineId');
                }
            });


            Schema::table('tblINV_MachineTickets', function ($table) {
                if (Schema::hasColumn('tblINV_MachineTickets', 'MCT_ItemNo')) {
                    $table->dropColumn('MCT_ItemNo');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
