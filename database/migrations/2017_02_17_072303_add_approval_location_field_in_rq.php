<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddApprovalLocationFieldInRq extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_RQDetail', function ($table) {

                if (!Schema::hasColumn('tblINV_RQDetail', 'RQD_ApprovalLocation')) {
                        $table->string('RQD_ApprovalLocation', 30)->nullable();
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

                if (Schema::hasColumn('tblINV_RQDetail', 'RQD_ApprovalLocation')) {
                    $table->dropColumn('RQD_ApprovalLocation');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
