<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdjustAmountFieldSize extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblCOM_PO', function ($table) {
                if (!Schema::hasColumn('tblCOM_PO', 'PO_Amount')) {
                    $table->decimal('PO_Amount', 30, 12)->change();
                }
            });

            Schema::table('tblCOM_PODetail', function ($table) {
                if (!Schema::hasColumn('tblCOM_PODetail', 'POD_UnitPrice')) {
                    $table->decimal('POD_UnitPrice', 30, 12)->change();
                }

                if (!Schema::hasColumn('tblCOM_PODetail', 'POD_Total')) {
                    $table->decimal('POD_Total', 30, 12)->change();
                }

                if (!Schema::hasColumn('tblCOM_PODetail', 'POD_VATAmount')) {
                    $table->decimal('POD_VATAmount', 30, 12)->change();
                }

                if (!Schema::hasColumn('tblCOM_PODetail', 'POD_NetOfVAT')) {
                    $table->decimal('POD_NetOfVAT', 30, 12)->change();
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
                if (!Schema::hasColumn('tblCOM_PO', 'PO_Amount')) {
                    $table->decimal('PO_Amount', 10, 4)->change();
                }
            });

            Schema::table('tblCOM_PODetail', function ($table) {
                if (!Schema::hasColumn('tblCOM_PODetail', 'POD_UnitPrice')) {
                    $table->decimal('POD_UnitPrice', 10, 4)->change();
                }

                if (!Schema::hasColumn('tblCOM_PODetail', 'POD_Total')) {
                    $table->decimal('POD_Total', 10, 4)->change();
                }

                if (!Schema::hasColumn('tblCOM_PODetail', 'POD_VATAmount')) {
                    $table->decimal('POD_VATAmount', 10, 4)->change();
                }

                if (!Schema::hasColumn('tblCOM_PODetail', 'POD_NetOfVAT')) {
                    $table->decimal('POD_NetOfVAT', 10, 4)->change();
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
