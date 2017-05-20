<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddItemInDispensePdItem extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_DispensedPDItems', function ($table) {

                if (!Schema::hasColumn('tblINV_DispensedPDItems', 'DIP_ItemNo')) {
                    $table->string('DIP_ItemNo', 30)->nullable();
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

            Schema::table('tblINV_DispensedPDItems', function ($table) {

                if (Schema::hasColumn('tblINV_DispensedPDItems', 'DIP_ItemNo')) {
                    $table->dropColumn('DIP_ItemNo');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
