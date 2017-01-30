<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankLoanAccount extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblACC_BankAccount', function ($table) {
                if (!Schema::hasColumn('tblACC_BankAccount', 'BA_LoanAccount')) {
                    $table->string('BA_LoanAccount')->nullable();
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

            Schema::table('tblACC_BankAccount', function ($table) {
                $table->dropColumn('BA_LoanAccount');
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
