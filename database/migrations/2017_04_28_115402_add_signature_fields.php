<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSignatureFields extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblCOM_CA', function ($table) {
                if (!Schema::hasColumn('tblCOM_CA', 'CA_SignatureURL')) {
                    $table->string('CA_SignatureURL', 200)->nullable();
                }
            });

            Schema::table('tblCOM_User', function ($table) {
                if (!Schema::hasColumn('tblCOM_User', 'U_SignatureURL')) {
                    $table->string('U_SignatureURL', 200)->nullable();
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

            Schema::table('tblCOM_CA', function ($table) {
                if (Schema::hasColumn('tblCOM_CA', 'CA_SignatureURL')) {
                    $table->dropColumn('CA_SignatureURL');
                }
            });


            Schema::table('tblCOM_User', function ($table) {
                if (Schema::hasColumn('tblCOM_User', 'U_SignatureURL')) {
                    $table->dropColumn('U_SignatureURL');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
