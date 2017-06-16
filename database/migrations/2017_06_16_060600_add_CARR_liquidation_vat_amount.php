<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCARRLiquidationVatAmount extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblCOM_CARRLiquidationDetail', function ($table) {
                if (!Schema::hasColumn('tblCOM_CARRLiquidationDetail', 'CARRD_VATAmount')) {
                    $table->decimal('CARRD_VATAmount', 12, 4)->default(0);
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

            Schema::table('tblCOM_CARRLiquidationDetail', function ($table) {
                if (Schema::hasColumn('tblCOM_CARRLiquidationDetail', 'CARRD_VATAmount')) {
                    $table->dropColumn('CARRD_VATAmount');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
