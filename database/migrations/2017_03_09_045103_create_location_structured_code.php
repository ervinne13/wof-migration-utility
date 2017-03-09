<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationStructuredCode extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_Location', function ($table) {

                if (!Schema::hasColumn('tblINV_Location', 'LOC_Structured_code')) {
                    $table->string('LOC_Structured_code', 100)->nullable();
                }

                if (!Schema::hasColumn('tblINV_Location', 'LOC_Selectable')) {
                    $table->boolean('LOC_Selectable')->default(true);
                }

                if (!Schema::hasColumn('tblINV_Location', 'LOC_Default_stock_area')) {
                    $table->boolean('LOC_Default_stock_area')->default(false);
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

            Schema::table('tblINV_Location', function ($table) {

                if (Schema::hasColumn('tblINV_Location', 'LOC_Structured_code')) {
                    $table->dropColumn('LOC_Structured_code');
                }

                if (Schema::hasColumn('tblINV_Location', 'LOC_Selectable')) {
                    $table->dropColumn('LOC_Selectable');
                }

                if (Schema::hasColumn('tblINV_Location', 'LOC_Default_stock_area')) {
                    $table->dropColumn('LOC_Default_stock_area');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
