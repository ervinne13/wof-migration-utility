<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRqTemporaryTransferFieldToTransferType extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_RQDetail', function ($table) {

                if (Schema::hasColumn('tblINV_RQDetail', 'RQD_Temporary')) {
                    $table->dropColumn('RQD_Temporary');
                }

                if (!Schema::hasColumn('tblINV_RQDetail', 'RQD_TransferType')) {
                    $table->string('RQD_TransferType', 20)->nullable();
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

                if (Schema::hasColumn('tblINV_RQDetail', 'RQD_TransferType')) {
                    $table->dropColumn('RQD_TransferType');
                }

                if (!Schema::hasColumn('tblINV_RQDetail', 'RQD_Temporary')) {
                    $table->boolean('RQD_Temporary')->default(false);
                }
            });
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
