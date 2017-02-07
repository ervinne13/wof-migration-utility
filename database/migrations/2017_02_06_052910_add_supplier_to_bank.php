<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSupplierToBank extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblACC_BankAccount', function ($table) {
                if (!Schema::hasColumn('tblACC_BankAccount', 'BA_SupplierID')) {
                    $table->string('BA_SupplierID')->nullable();
                }

                if (!Schema::hasColumn('tblACC_BankAccount', 'BA_SupplierName')) {
                    $table->string('BA_SupplierName')->nullable();
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
                $table->dropColumn('BA_SupplierID');
                $table->dropColumn('BA_SupplierName');
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
