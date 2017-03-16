<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRemainingQtyToRqDetail extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_RQDetail', function ($table) {

                if (!Schema::hasColumn('tblINV_RQDetail', 'RQD_RemainingQty')) {
                    $table->decimal('RQD_RemainingQty', 12, 4)->default(0);
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

            Schema::table('tblINV_RQDetail', function ($table) {

                if (Schema::hasColumn('tblINV_RQDetail', 'RQD_RemainingQty')) {
                    $table->dropColumn('RQD_RemainingQty');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
