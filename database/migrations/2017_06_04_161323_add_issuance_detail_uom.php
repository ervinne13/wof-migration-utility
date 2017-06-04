<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddIssuanceDetailUom extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_IssuanceDetailDuodecuple', function ($table) {

                if (!Schema::hasColumn('tblINV_IssuanceDetailDuodecuple', 'ISD_ItemUOMCode')) {
                    $table->string('ISD_ItemUOMCode', 30)->nullable();
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

            Schema::table('tblINV_IssuanceDetailDuodecuple', function ($table) {

                if (Schema::hasColumn('tblINV_IssuanceDetailDuodecuple', 'ISD_ItemUOMCode')) {
                    $table->dropColumn('ISD_ItemUOMCode');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
