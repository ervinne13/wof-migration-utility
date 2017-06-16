<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExternalDocNoInRR extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_RR', function ($table) {
                if (!Schema::hasColumn('tblINV_RR', 'RR_ExternalDocNo')) {
                    $table->string('RR_ExternalDocNo', 100)->nullable();
                }

                if (!Schema::hasColumn('tblINV_RR', 'RR_TIN')) {
                    $table->string('RR_TIN', 100)->nullable();
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

            Schema::table('tblINV_RR', function ($table) {
                if (Schema::hasColumn('tblINV_RR', 'RR_ExternalDocNo')) {
                    $table->dropColumn('RR_ExternalDocNo');
                }
                if (Schema::hasColumn('tblINV_RR', 'RR_TIN')) {
                    $table->dropColumn('RR_TIN');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
