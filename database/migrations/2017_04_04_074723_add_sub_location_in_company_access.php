<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubLocationInCompanyAccess extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblCOM_CompanyAccess', function ($table) {

                if (!Schema::hasColumn('tblCOM_CompanyAccess', 'CA_FK_SubLocation')) {
                    $table->string('CA_FK_SubLocation', 32)->nullable();
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

                if (Schema::hasColumn('tblCOM_CompanyAccess', 'CA_FK_SubLocation')) {
                    $table->dropColumn('CA_FK_SubLocation');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
