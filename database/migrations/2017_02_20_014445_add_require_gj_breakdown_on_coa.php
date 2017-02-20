<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRequireGjBreakdownOnCoa extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblACC_ChartAccount', function ($table) {

                if (!Schema::hasColumn('tblACC_ChartAccount', 'COA_RequireGJBreakdown')) {
                    $table->boolean('COA_RequireGJBreakdown')->default(false);
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

            Schema::table('tblACC_ChartAccount', function ($table) {

                if (Schema::hasColumn('tblACC_ChartAccount', 'COA_RequireGJBreakdown')) {
                    $table->dropColumn('COA_RequireGJBreakdown');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
