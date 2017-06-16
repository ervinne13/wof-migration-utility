<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRequiredFieldsInCARR extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblCOM_CARRLiquidationDetail', function ($table) {
                if (!Schema::hasColumn('tblCOM_CARRLiquidationDetail', 'CARRD_Date')) {
                    $table->date('CARRD_Date')->nullable();
                }

                if (!Schema::hasColumn('tblCOM_CARRLiquidationDetail', 'CARRD_ExternalDocNo')) {
                    $table->string('CARRD_ExternalDocNo', 100)->nullable();
                }

                if (!Schema::hasColumn('tblCOM_CARRLiquidationDetail', 'CARRD_TIN')) {
                    $table->string('CARRD_TIN', 100)->nullable();
                }

                if (!Schema::hasColumn('tblCOM_CARRLiquidationDetail', 'CARRD_VATAmount')) {
                    $table->decimal('CARRD_VATAmount', 12, 4)->default(0);
                }

                if (!Schema::hasColumn('tblCOM_CARRLiquidationDetail', 'CARRD_NetofVAT')) {
                    $table->decimal('CARRD_NetofVAT', 12, 4)->default(0);
                }

                if (!Schema::hasColumn('tblCOM_CARRLiquidationDetail', 'CARRD_SupplierID')) {
                    $table->string('CARRD_SupplierID', 30)->nullable();
                }

                if (!Schema::hasColumn('tblCOM_CARRLiquidationDetail', 'CARRD_RR_RefFrom')) {
                    $table->string('CARRD_RR_RefFrom', 30)->nullable();
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

            Schema::table('tblCOM_CARRLiquidationDetail', function ($table) {
                if (Schema::hasColumn('tblCOM_CARRLiquidationDetail', 'CARRD_VATAmount')) {
                    $table->dropColumn('CARRD_VATAmount');
                }

                if (Schema::hasColumn('tblCOM_CARRLiquidationDetail', 'CARRD_ExternalDocNo')) {
                    $table->dropColumn('CARRD_ExternalDocNo');
                }

                if (Schema::hasColumn('tblCOM_CARRLiquidationDetail', 'CARRD_TIN')) {
                    $table->dropColumn('CARRD_TIN');
                }

                if (Schema::hasColumn('tblCOM_CARRLiquidationDetail', 'CARRD_VATAmount')) {
                    $table->dropColumn('CARRD_VATAmount');
                }

                if (Schema::hasColumn('tblCOM_CARRLiquidationDetail', 'CARRD_NetofVAT')) {
                    $table->dropColumn('CARRD_NetofVAT');
                }

                if (Schema::hasColumn('tblCOM_CARRLiquidationDetail', 'CARRD_SupplierID')) {
                    $table->dropColumn('CARRD_SupplierID');
                }

                if (Schema::hasColumn('tblCOM_CARRLiquidationDetail', 'CARRD_RR_RefFrom')) {
                    $table->dropColumn('CARRD_RR_RefFrom');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
