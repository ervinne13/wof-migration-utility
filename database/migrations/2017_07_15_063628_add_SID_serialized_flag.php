<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSIDSerializedFlag extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_SalesInvoiceDetail', function ($table) {
                if (!Schema::hasColumn('tblINV_SalesInvoiceDetail', 'SID_Serialized')) {
                    $table->boolean('SID_Serialized')->default(false);
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

            Schema::table('tblINV_SalesInvoiceDetail', function ($table) {
                if (Schema::hasColumn('tblINV_SalesInvoiceDetail', 'SID_Serialized')) {
                    $table->dropColumn('SID_Serialized');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
