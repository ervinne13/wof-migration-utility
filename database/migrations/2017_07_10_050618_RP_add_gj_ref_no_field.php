<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RPAddGjRefNoField extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblACC_RPHeader', function ($table) {
                if (!Schema::hasColumn('tblACC_RPHeader', 'RPH_RefGJDocNo')) {
                    $table->string('RPH_RefGJDocNo', 30)->nullable();
                }

                if (!Schema::hasColumn('tblACC_RPHeader', 'RPH_RequiredAmountBrokenDown')) {
                    $table->decimal('RPH_RequiredAmountBrokenDown', 30, 12)->default(0);
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

            Schema::table('tblACC_RPHeader', function ($table) {
                if (Schema::hasColumn('tblACC_RPHeader', 'RPH_RefGJDocNo')) {
                    $table->dropColumn('RPH_RefGJDocNo');
                }

                if (Schema::hasColumn('tblACC_RPHeader', 'RPH_RequiredAmountBrokenDown')) {
                    $table->dropColumn('RPH_RequiredAmountBrokenDown');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
