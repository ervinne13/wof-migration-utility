<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddItemLastPoCostUOMId extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_Item', function ($table) {
                if (!Schema::hasColumn('tblINV_Item', 'IM_LastPOCostUOMId')) {
                    $table->bigInteger('IM_LastPOCostUOMId')->nullable();
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
                if (!Schema::hasColumn('tblINV_Item', 'IM_LastPOCostUOMId')) {
                    $table->dropColumn('IM_LastPOCostUOMId');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
