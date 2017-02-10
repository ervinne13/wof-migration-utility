<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWhtFieldToReimbursement extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblCOM_Reimbursement', function ($table) {

                if (!Schema::hasColumn('tblCOM_Reimbursement', 'RE_WHT')) {
                    $table->string('RE_WHT', 30)->nullable();
                }
            });

            Schema::table('tblCOM_ReimbursementDetail', function ($table) {

                if (!Schema::hasColumn('tblCOM_ReimbursementDetail', 'RED_WHT')) {
                    $table->string('RED_WHT', 30)->nullable();
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

            Schema::table('tblCOM_Reimbursement', function ($table) {

                if (Schema::hasColumn('tblCOM_Reimbursement', 'RE_WHT')) {
                    $table->dropColumn('RE_WHT');
                }
            });

            Schema::table('tblCOM_ReimbursementDetail', function ($table) {

                if (Schema::hasColumn('tblCOM_ReimbursementDetail', 'RED_WHT')) {
                    $table->dropColumn('RED_WHT');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
