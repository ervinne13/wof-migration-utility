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

            Schema::table('tblINV_RQ', function ($table) {

                if (!Schema::hasColumn('tblINV_RQ', 'RQ_ApprovalLocation')) {
                    $table->string('RQ_ApprovalLocation', 30)->nullable();
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

            Schema::table('tblINV_RQ', function ($table) {

                if (Schema::hasColumn('tblINV_RQ', 'RQ_ApprovalLocation')) {
                    $table->dropColumn('RQ_ApprovalLocation');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
