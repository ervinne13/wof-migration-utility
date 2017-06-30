<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTaxesFieldsToCV extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblACC_CVHeader', function ($table) {
                if (!Schema::hasColumn('tblACC_CVHeader', 'CV_NetOfVat')) {
                    $table->decimal('CV_NetOfVat', 30, 12)->default(0);
                }

                if (!Schema::hasColumn('tblACC_CVHeader', 'CV_VATAmount')) {
                    $table->decimal('CV_VATAmount', 30, 12)->default(0);
                }

                if (!Schema::hasColumn('tblACC_CVHeader', 'CV_WHTAmount')) {
                    $table->decimal('CV_WHTAmount', 30, 12)->default(0);
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

            Schema::table('tblACC_CVHeader', function ($table) {
                if (Schema::hasColumn('tblACC_CVHeader', 'CV_NetOfVat')) {
                    $table->dropColumn('CV_NetOfVat');
                }

                if (Schema::hasColumn('tblACC_CVHeader', 'CV_VATAmount')) {
                    $table->dropColumn('CV_VATAmount');
                }

                if (Schema::hasColumn('tblACC_CVHeader', 'CV_WHTAmount')) {
                    $table->dropColumn('CV_WHTAmount');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
