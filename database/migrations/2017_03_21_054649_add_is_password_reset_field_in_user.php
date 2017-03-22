<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsPasswordResetFieldInUser extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblCOM_User', function ($table) {

                if (!Schema::hasColumn('tblCOM_User', 'U_IsPasswordReset')) {
                    $table->boolean('U_IsPasswordReset')->default(false);
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

            Schema::table('tblCOM_User', function ($table) {

                if (Schema::hasColumn('tblCOM_User', 'U_IsPasswordReset')) {
                    $table->dropColumn('U_IsPasswordReset');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
