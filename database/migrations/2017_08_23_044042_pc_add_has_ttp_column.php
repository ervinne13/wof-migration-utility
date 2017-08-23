<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PcAddHasTtpColumn extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            $query = 'ALTER TABLE "tblINV_PCount" ADD COLUMN "PC_HasTTP" bit(1)';
            DB::statement($query);    

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

            Schema::table('tblINV_PCount', function ($table) {
                if (!Schema::hasColumn('tblINV_PCount', 'PC_HasTTP')) {
                    $table->dropColumn('PC_HasTTP');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
