<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRPHeaderPostingGroups extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblACC_RPHeader', function ($table) {

                if (!Schema::hasColumn('tblACC_RPHeader', 'RPH_VAT')) {
                    $table->string('RPH_VAT', 30)->nullable();
                    $table->string('RPH_WHT', 30)->nullable();
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

            Schema::table('tblACC_RPHeader', function ($table) {

                if (Schema::hasColumn('tblACC_RPHeader', 'RPH_VAT')) {
                    $table->dropColumn('RPH_VAT');
                    $table->dropColumn('RPH_WHT');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
