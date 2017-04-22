<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAttachmentFieldsInCA extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblCOM_CA', function ($table) {

                if (!Schema::hasColumn('tblCOM_CA', 'CA_LiquidationAttachment')) {
                    $table->json('CA_LiquidationAttachment', 12, 4)->nullable();
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

                if (Schema::hasColumn('tblCOM_CA', 'CA_LiquidationAttachment')) {
                    $table->dropColumn('CA_LiquidationAttachment');
                }

            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
