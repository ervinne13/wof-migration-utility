<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVatColumnsInRPD extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblACC_RPDetails', function ($table) {

                if (!Schema::hasColumn('tblACC_RPDetails', 'RPD_VATAmount')) {
                    $table->decimal('RPD_VATAmount', 12, 4)->default(0);
                }

                if (!Schema::hasColumn('tblACC_RPDetails', 'RPD_NetOfVAT')) {
                    $table->decimal('RPD_NetOfVAT', 12, 4)->default(0);
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

            Schema::table('tblACC_RPDetails', function ($table) {

                if (Schema::hasColumn('tblACC_RPDetails', 'RPD_VATAmount')) {
                    $table->dropColumn('RPD_VATAmount');
                }

                if (Schema::hasColumn('tblACC_RPDetails', 'RPD_NetOfVAT')) {
                    $table->dropColumn('RPD_NetOfVAT');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
