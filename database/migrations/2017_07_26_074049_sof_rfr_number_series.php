<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SofRfrNumberSeries extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            // Schema::table('tblCOM_SourceOfFund', function ($table) {
            //     if (Schema::hasColumn('tblCOM_SourceOfFund', 'SOF_NSId')) {
            //         $table->renameColumn('SOF_NSId', 'SOF_RFVNSId')->nullable();
            //     }

            //     if (!Schema::hasColumn('tblCOM_SourceOfFund', 'SOF_RFRNSId')) {
            //         $table->string('SOF_RFRNSId', 30)->nullable();
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
            //     if (Schema::hasColumn('tblCOM_SourceOfFund', 'SOF_RFVNSId')) {
            //         $table->renameColumn('SOF_RFVNSId', 'SOF_NSId');
            //     }

            //     if (!Schema::hasColumn('tblCOM_SourceOfFund', 'SOF_RFRNSId')) {
            //         $table->dropColumn('SOF_RFRNSId');
            //     }
            // });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
