<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddShortagePayment extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_Issuance', function ($table) {
                if (!Schema::hasColumn('tblINV_Issuance', 'IS_ShortagePayment')) {
                    $table->decimal('IS_ShortagePayment', 12, 4)->nullable();
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

            Schema::table('tblINV_Issuance', function ($table) {
                if (Schema::hasColumn('tblINV_Issuance', 'IS_ShortagePayment')) {
                    $table->dropColumn('IS_ShortagePayment');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
