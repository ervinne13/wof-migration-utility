<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCvAmountLcy extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblACC_CVHeader', function ($table) {

                if (!Schema::hasColumn('tblACC_CVHeader', 'CV_AmountLCY')) {
                    $table->decimal('CV_AmountLCY', 10, 4)->default(0);
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

                if (Schema::hasColumn('tblACC_CVHeader', 'CV_AmountLCY')) {
                    $table->dropColumn('CV_AmountLCY');
                }
            });
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
