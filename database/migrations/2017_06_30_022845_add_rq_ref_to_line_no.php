<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRqRefToLineNo extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_RQDetail', function ($table) {
                if (!Schema::hasColumn('tblINV_RQDetail', 'RQD_RefToLineNo')) {
                    $table->bigInteger('RQD_RefToLineNo')->default(0);
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

            Schema::table('tblINV_RQDetail', function ($table) {
                if (Schema::hasColumn('tblINV_RQDetail', 'RQD_RefToLineNo')) {
                    $table->dropColumn('RQD_RefToLineNo');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
