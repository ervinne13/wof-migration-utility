<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForCanvassFieldInItem extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_Item', function ($table) {

                if (!Schema::hasColumn('tblINV_Item', 'IM_ForCanvass')) {
                    $table->boolean('IM_ForCanvass')->default(false);
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

                if (Schema::hasColumn('tblINV_Item', 'IM_ForCanvass')) {
                    $table->dropColumn('IM_ForCanvass');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
