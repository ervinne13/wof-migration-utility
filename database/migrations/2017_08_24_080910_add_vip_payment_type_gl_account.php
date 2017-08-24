<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVipPaymentTypeGlAccount extends Migration
{
  /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblCOM_VIPPaymentType', function ($table) {
                if (!Schema::hasColumn('tblCOM_VIPPaymentType', 'VIPPT_GLAccount')) {
                    $table->string('VIPPT_GLAccount', 30)->nullable();
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

            Schema::table('tblCOM_VIPPaymentType', function ($table) {
                if (!Schema::hasColumn('tblCOM_VIPPaymentType', 'VIPPT_GLAccount')) {
                    $table->dropColumn('VIPPT_GLAccount');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
