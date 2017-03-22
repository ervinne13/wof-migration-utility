<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddSeriesToPoToSi extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblCOM_PODetail', function ($table) {

                if (!Schema::hasColumn('tblCOM_PODetail', 'POD_SeriesFrom')) {
                    $table->integer('POD_SeriesFrom')->nullable();
                }

                if (!Schema::hasColumn('tblCOM_PODetail', 'POD_SeriesTo')) {
                    $table->integer('POD_SeriesTo')->nullable();
                }
            });

            Schema::table('tblCOM_TODetail', function ($table) {

                if (!Schema::hasColumn('tblCOM_TODetail', 'TOD_SeriesFrom')) {
                    $table->integer('TOD_SeriesFrom')->nullable();
                }

                if (!Schema::hasColumn('tblCOM_TODetail', 'TOD_SeriesTo')) {
                    $table->integer('TOD_SeriesTo')->nullable();
                }
            });

            Schema::table('tblINV_SalesInvoiceDetail', function ($table) {

                if (!Schema::hasColumn('tblINV_SalesInvoiceDetail', 'SID_SeriesFrom')) {
                    $table->integer('SID_SeriesFrom')->nullable();
                }

                if (!Schema::hasColumn('tblINV_SalesInvoiceDetail', 'SID_SeriesTo')) {
                    $table->integer('SID_SeriesTo')->nullable();
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

            Schema::table('tblCOM_PODetail', function ($table) {

                if (Schema::hasColumn('tblCOM_PODetail', 'POD_SeriesFrom')) {
                    $table->dropColumn('POD_SeriesFrom');
                }

                if (Schema::hasColumn('tblCOM_PODetail', 'POD_SeriesTo')) {
                    $table->dropColumn('POD_SeriesTo');
                }
            });

            Schema::table('tblCOM_TODetail', function ($table) {

                if (Schema::hasColumn('tblCOM_TODetail', 'TOD_SeriesFrom')) {
                    $table->dropColumn('TOD_SeriesFrom');
                }

                if (Schema::hasColumn('tblCOM_TODetail', 'TOD_SeriesTo')) {
                    $table->dropColumn('TOD_SeriesTo');
                }
            });

            Schema::table('tblINV_SalesInvoiceDetail', function ($table) {

                if (Schema::hasColumn('tblINV_SalesInvoiceDetail', 'SID_SeriesFrom')) {
                    $table->dropColumn('SID_SeriesFrom');
                }

                if (Schema::hasColumn('tblINV_SalesInvoiceDetail', 'SID_SeriesTo')) {
                    $table->dropColumn('SID_SeriesTo');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
