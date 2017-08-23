<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSofNumberSeries extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            // Schema::table('tblCOM_SourceOfFund', function ($table) {
            //     if (!Schema::hasColumn('tblCOM_SourceOfFund', 'SOF_NSId')) {
            //         $table->string('SOF_NSId', 30);
            //     }
            // });

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

            // Schema::table('tblCOM_SourceOfFund', function ($table) {
            //     if (Schema::hasColumn('tblCOM_SourceOfFund', 'SOF_NSId')) {
            //         $table->dropColumn('SOF_NSId');
            //     }
            // });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
