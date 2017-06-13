<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCoinChangeFields extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_IssuanceDetailDuodecuple', function ($table) {
                if (!Schema::hasColumn('tblINV_IssuanceDetailDuodecuple', 'ISD_Bills')) {
                    $table->bigInteger('ISD_Bills')->default(0);
                }

                if (!Schema::hasColumn('tblINV_IssuanceDetailDuodecuple', 'ISD_Coins')) {
                    $table->bigInteger('ISD_Coins')->default(0);
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
                if (Schema::hasColumn('tblINV_IssuanceDetailDuodecuple', 'ISD_Bills')) {
                    $table->dropColumn('ISD_Bills');
                }
                if (Schema::hasColumn('tblINV_IssuanceDetailDuodecuple', 'ISD_Coins')) {
                    $table->dropColumn('ISD_Coins');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
