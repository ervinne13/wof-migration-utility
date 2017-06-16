<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRRType extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_RR', function ($table) {
                if (!Schema::hasColumn('tblINV_RR', 'RR_Type')) {
                    $table->string('RR_Type', 10)->nullable();
                }

                if (!Schema::hasColumn('tblINV_RR', 'RR_RefFrom')) {
                    $table->string('RR_RefFrom', 30)->nullable();
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
                if (Schema::hasColumn('tblINV_RR', 'RR_Type')) {
                    $table->dropColumn('RR_Type');
                }

                if (Schema::hasColumn('tblINV_RR', 'RR_RefFrom')) {
                    $table->dropColumn('RR_RefFrom');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
