<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddSubLocationInUser extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblCOM_User', function ($table) {

                if (!Schema::hasColumn('tblCOM_User', 'U_Default_sub_location')) {
                    $table->string('U_Default_sub_location', 30)->nullable();
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

                if (Schema::hasColumn('tblCOM_User', 'U_Default_sub_location')) {
                    $table->dropColumn('U_Default_sub_location');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
