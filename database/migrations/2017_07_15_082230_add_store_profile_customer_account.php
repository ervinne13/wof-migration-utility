<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStoreProfileCustomerAccount extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_StoreProfile', function ($table) {
                if (!Schema::hasColumn('tblINV_StoreProfile', 'SP_CustomerAccountID')) {
                    $table->string('SP_CustomerAccountID', 30)->nullable();
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

            Schema::table('tblINV_StoreProfile', function ($table) {
                if (Schema::hasColumn('tblINV_StoreProfile', 'SP_CustomerAccountID')) {
                    $table->dropColumn('SP_CustomerAccountID');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
