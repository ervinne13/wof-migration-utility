<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddItemLastPoCostCurrencyId extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_Item', function ($table) {
                if (!Schema::hasColumn('tblINV_Item', 'IM_LastPOCostCurrencyId')) {
                    $table->bigInteger('IM_LastPOCostCurrencyId')->nullable();
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

            Schema::table('tblINV_Item', function ($table) {
                if (!Schema::hasColumn('tblINV_Item', 'IM_LastPOCostCurrencyId')) {
                    $table->dropColumn('IM_LastPOCostCurrencyId');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
