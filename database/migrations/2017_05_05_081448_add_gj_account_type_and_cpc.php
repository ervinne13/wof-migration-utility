<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGjAccountTypeAndCpc extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblACC_GJHeader', function ($table) {

                if (!Schema::hasColumn('tblACC_GJHeader', 'GJ_AccountType')) {
                    $table->string('GJ_AccountType', 30)->nullable();
                }

                if (!Schema::hasColumn('tblACC_GJHeader', 'GJ_CPC')) {
                    $table->string('GJ_CPC', 30)->nullable();
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

            Schema::table('tblACC_GJHeader', function ($table) {

                if (Schema::hasColumn('tblACC_GJHeader', 'GJ_AccountType')) {
                    $table->dropColumn('GJ_AccountType');
                }

                if (Schema::hasColumn('tblACC_GJHeader', 'GJ_CPC')) {
                    $table->dropColumn('GJ_CPC');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
