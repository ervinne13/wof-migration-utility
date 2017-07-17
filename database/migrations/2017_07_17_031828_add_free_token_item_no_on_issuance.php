<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFreeTokenItemNoOnIssuance extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_IssuanceDetailDuodecuple', function ($table) {
                if (!Schema::hasColumn('tblINV_IssuanceDetailDuodecuple', 'ISD_FreeItemNo')) {
                    $table->string('ISD_FreeItemNo', 30)->nullable();
                }

                if (!Schema::hasColumn('tblINV_IssuanceDetailDuodecuple', 'ISD_PromoName')) {
                    $table->string('ISD_PromoName', 30)->nullable();
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
                if (Schema::hasColumn('tblINV_IssuanceDetailDuodecuple', 'ISD_FreeItemNo')) {
                    $table->dropColumn('ISD_FreeItemNo');
                }

                if (Schema::hasColumn('tblINV_IssuanceDetailDuodecuple', 'ISD_PromoName')) {
                    $table->dropColumn('ISD_PromoName');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
