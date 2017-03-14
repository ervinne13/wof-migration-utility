<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRemainingStockOnHandOnRqld extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_RQLDetail', function ($table) {

                if (!Schema::hasColumn('tblINV_RQLDetail', 'RQLD_RemainingStockOnHand')) {
                    $table->decimal('RQLD_RemainingStockOnHand', 12, 4)->default(0);
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

            Schema::table('tblINV_RQLDetail', function ($table) {

                if (Schema::hasColumn('tblINV_RQLDetail', 'RQLD_RemainingStockOnHand')) {
                    $table->dropColumn('RQLD_RemainingStockOnHand');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
