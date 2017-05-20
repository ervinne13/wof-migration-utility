<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFinalizepdweekno extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_Dispensed', function ($table) {

                if (!Schema::hasColumn('tblINV_Dispensed', 'DI_FinalizedPDWeekNo')) {
                    $table->string('DI_FinalizedPDWeekNo', 20)->nullable();
                }

                if (!Schema::hasColumn('tblINV_Dispensed', 'DI_FinalizedTicketWeekNo')) {
                    $table->string('DI_FinalizedTicketWeekNo', 20)->nullable();
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

            Schema::table('tblINV_Dispensed', function ($table) {

                if (Schema::hasColumn('tblINV_Dispensed', 'DI_FinalizedPDWeekNo')) {
                    $table->dropColumn('DI_FinalizedPDWeekNo');
                }

                if (!Schema::hasColumn('tblINV_Dispensed', 'DI_FinalizedTicketWeekNo')) {
                    $table->string('DI_FinalizedTicketWeekNo', 20)->nullable();
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
