<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAllSublocationAccessToLocation extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblCOM_CompanyAccess', function ($table) {

                if (!Schema::hasColumn('tblCOM_CompanyAccess', 'CA_HasFullSubLocationAccess')) {
                    $table->boolean('CA_HasFullSubLocationAccess')->default(false);
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

            Schema::table('tblCOM_CompanyAccess', function ($table) {

                if (Schema::hasColumn('tblCOM_CompanyAccess', 'CA_HasFullSubLocationAccess')) {
                    $table->dropColumn('CA_HasFullSubLocationAccess');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
