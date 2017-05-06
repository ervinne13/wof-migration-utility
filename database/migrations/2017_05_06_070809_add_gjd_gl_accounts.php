<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGjdGlAccounts extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblACC_GJDetail', function ($table) {

                if (!Schema::hasColumn('tblACC_GJDetail', 'GJD_GLAccountNo')) {
                    $table->string('GJD_GLAccountNo', 30)->nullable();
                }

                if (!Schema::hasColumn('tblACC_GJDetail', 'GJD_GLAccountName')) {
                    $table->string('GJD_GLAccountName', 100)->nullable();
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

            Schema::table('tblACC_GJDetail', function ($table) {

                if (Schema::hasColumn('tblACC_GJDetail', 'GJD_GLAccountNo')) {
                    $table->dropColumn('GJD_GLAccountNo');
                }

                if (Schema::hasColumn('tblACC_GJDetail', 'GJD_GLAccountName')) {
                    $table->dropColumn('GJD_GLAccountName');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
