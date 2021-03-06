<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReceivingSubLocation extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblCOM_PODetail', function ($table) {

                if (!Schema::hasColumn('tblCOM_PODetail', 'POD_SubLocation')) {
                    $table->string('POD_SubLocation', 32)->nullable();
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

                if (Schema::hasColumn('tblCOM_PODetail', 'POD_SubLocation')) {
                    $table->dropColumn('POD_SubLocation');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
