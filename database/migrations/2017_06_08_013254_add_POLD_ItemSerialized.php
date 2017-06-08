<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPOLDItemSerialized extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblCOM_POLDetail', function ($table) {

                if (!Schema::hasColumn('tblCOM_POLDetail', 'POLD_ItemSerialized')) {
                    $table->boolean('POLD_ItemSerialized')->default(false);
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

            Schema::table('tblCOM_POLDetail', function ($table) {
                if (Schema::hasColumn('tblCOM_POLDetail', 'POLD_ItemSerialized')) {
                    $table->dropColumn('POLD_ItemSerialized');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
