<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStoreProfilePinNumber extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_StoreProfile', function ($table) {
                if (!Schema::hasColumn('tblINV_StoreProfile', 'SP_PinNumber')) {
                    $table->string('SP_PinNumber', 120)->nullable();
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

            Schema::table('tblINV_StoreProfile', function ($table) {
                if (!Schema::hasColumn('tblINV_StoreProfile', 'SP_PinNumber')) {
                    $table->dropColumn('SP_PinNumber');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
