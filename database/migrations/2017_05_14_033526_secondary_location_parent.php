<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SecondaryLocationParent extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_Location', function ($table) {

                if (!Schema::hasColumn('tblINV_Location', 'LOC_SecondaryRootParent_id')) {
                    $table->string('LOC_SecondaryRootParent_id', 30)->nullable();
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

                if (Schema::hasColumn('tblINV_Location', 'LOC_SecondaryRootParent_id')) {
                    $table->dropColumn('LOC_SecondaryRootParent_id');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
