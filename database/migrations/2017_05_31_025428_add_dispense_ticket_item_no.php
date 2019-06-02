<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDispenseTicketItemNo extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_DispensedTicket', function ($table) {

                if (!Schema::hasColumn('tblINV_DispensedTicket', 'DIT_ItemNo')) {
                    $table->string('DIT_ItemNo', 30)->nullable();
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

            Schema::table('tblINV_DispensedTicket', function ($table) {

                if (Schema::hasColumn('tblINV_DispensedTicket', 'DIT_ItemNo')) {
                    $table->dropColumn('DIT_ItemNo');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
