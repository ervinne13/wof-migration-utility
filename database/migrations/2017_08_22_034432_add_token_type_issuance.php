<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTokenTypeIssuance extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_IssuanceDetailDuodecuple', function ($table) {
                if (!Schema::hasColumn('tblINV_IssuanceDetailDuodecuple', 'ISD_PromoTokenType')) {
                    $table->string('ISD_PromoTokenType', 30)->nullable();
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
                if (!Schema::hasColumn('tblINV_IssuanceDetailDuodecuple', 'ISD_PromoTokenType')) {
                    $table->dropColumn('ISD_PromoTokenType');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
