<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RpAddAppliesToRemainingQty extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblACC_RPHeader', function ($table) {
                if (!Schema::hasColumn('tblACC_RPHeader', 'RPH_AppToRemAmount')) {
                    $table->decimal('RPH_AppToRemAmount', 30, 12)->default(0);
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
                if (Schema::hasColumn('tblACC_RPHeader', 'RPH_AppToRemAmount')) {
                    $table->dropColumn('RPH_AppToRemAmount');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
