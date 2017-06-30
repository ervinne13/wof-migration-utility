<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTaxesFieldsToAPV extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblACC_APVHeader', function ($table) {
                if (!Schema::hasColumn('tblACC_APVHeader', 'APV_NetOfVat')) {
                    $table->decimal('APV_NetOfVat', 30, 12)->default(0);
                }

                if (!Schema::hasColumn('tblACC_APVHeader', 'APV_VATAmount')) {
                    $table->decimal('APV_VATAmount', 30, 12)->default(0);
                }
            });

            Schema::table('tblACC_APVDetail', function ($table) {
                if (!Schema::hasColumn('tblACC_APVDetail', 'APVD_NetOfVat')) {
                    $table->decimal('APVD_NetOfVat', 30, 12)->default(0);
                }

                if (!Schema::hasColumn('tblACC_APVDetail', 'APVD_VATAmount')) {
                    $table->decimal('APVD_VATAmount', 30, 12)->default(0);
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

            Schema::table('tblACC_APVHeader', function ($table) {
                if (Schema::hasColumn('tblACC_APVHeader', 'APV_NetOfVat')) {
                    $table->dropColumn('APV_NetOfVat');
                }

                if (Schema::hasColumn('tblACC_APVHeader', 'APV_VATAmount')) {
                    $table->dropColumn('APV_VATAmount');
                }
            });

            Schema::table('tblACC_APVDetail', function ($table) {
                if (Schema::hasColumn('tblACC_APVDetail', 'APVD_NetOfVat')) {
                    $table->dropColumn('APVD_NetOfVat');
                }

                if (Schema::hasColumn('tblACC_APVDetail', 'APVD_VATAmount')) {
                    $table->dropColumn('APVD_VATAmount');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
