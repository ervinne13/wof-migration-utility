<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRefAmountInAPV extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblACC_APVHeader', function ($table) {

                if (!Schema::hasColumn('tblACC_APVHeader', 'APV_RefDocAmount')) {
                    $table->decimal('APV_RefDocAmount', 12, 4)->nullable();
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

            Schema::table('tblACC_APVHeader', function ($table) {

                if (Schema::hasColumn('tblACC_APVHeader', 'APV_RefDocAmount')) {
                    $table->dropColumn('APV_RefDocAmount');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
