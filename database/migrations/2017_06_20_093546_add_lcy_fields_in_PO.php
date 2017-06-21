<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLcyFieldsInPO extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblCOM_PO', function ($table) {
                if (!Schema::hasColumn('tblCOM_PO', 'PO_AmountLCY')) {
                    $table->decimal('PO_AmountLCY', 30, 12)->default(0);
                }
            });

            Schema::table('tblCOM_PODetail', function ($table) {
                if (!Schema::hasColumn('tblCOM_PODetail', 'POD_UnitPriceLCY')) {
                    $table->decimal('POD_UnitPriceLCY', 30, 12)->default(0);
                }

                if (!Schema::hasColumn('tblCOM_PODetail', 'POD_TotalLCY')) {
                    $table->decimal('POD_TotalLCY', 30, 12)->default(0);
                }

                if (!Schema::hasColumn('tblCOM_PODetail', 'POD_VATAmountLCY')) {
                    $table->decimal('POD_VATAmountLCY', 30, 12)->default(0);
                }

                if (!Schema::hasColumn('tblCOM_PODetail', 'POD_NetOfVATLCY')) {
                    $table->decimal('POD_NetOfVATLCY', 30, 12)->default(0);
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

            Schema::table('tblCOM_PO', function ($table) {
                if (Schema::hasColumn('tblCOM_PO', 'PO_AmountLCY')) {
                    $table->dropColumn('PO_AmountLCY');
                }
            });

            Schema::table('tblCOM_PODetail', function ($table) {
                if (Schema::hasColumn('tblCOM_PODetail', 'POD_UnitPriceLCY')) {
                    $table->dropColumn('POD_UnitPriceLCY');
                }

                if (Schema::hasColumn('tblCOM_PODetail', 'POD_TotalLCY')) {
                    $table->dropColumn('POD_TotalLCY');
                }

                if (Schema::hasColumn('tblCOM_PODetail', 'POD_VATAmountLCY')) {
                    $table->dropColumn('POD_VATAmountLCY');
                }

                if (Schema::hasColumn('tblCOM_PODetail', 'POD_NetOfVATLCY')) {
                    $table->dropColumn('POD_NetOfVATLCY');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
