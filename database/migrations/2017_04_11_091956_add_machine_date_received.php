<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddMachineDateReceived extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_Machine', function ($table) {

                if (!Schema::hasColumn('tblINV_Machine', 'MC_DateReceived')) {
                    $table->timestamp('MC_DateReceived')->useCurrent = true;
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

            Schema::table('tblINV_Machine', function ($table) {

                if (Schema::hasColumn('tblINV_Machine', 'MC_DateReceived')) {
                    $table->dropColumn('MC_DateReceived');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
