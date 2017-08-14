<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCVDetailDisplayAmount extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblACC_CVDetail', function ($table) {
                if (!Schema::hasColumn('tblACC_CVDetail', 'CVD_DisplayAmount')) {
                    $table->decimal('CVD_DisplayAmount', 12, 4)->nullable();
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

            Schema::table('tblACC_CVDetail', function ($table) {
                if (!Schema::hasColumn('tblACC_CVDetail', 'CVD_DisplayAmount')) {
                    $table->dropColumn('CVD_DisplayAmount');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
