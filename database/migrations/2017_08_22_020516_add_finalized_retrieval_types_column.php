<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFinalizedRetrievalTypesColumn extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_Retrieval', function ($table) {
                if (!Schema::hasColumn('tblINV_Retrieval', 'RV_FinalizedRetrievalTypes')) {
                    $table->string('RV_FinalizedRetrievalTypes', 120)->nullable();
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

            Schema::table('tblINV_Retrieval', function ($table) {
                if (!Schema::hasColumn('tblINV_Retrieval', 'RV_FinalizedRetrievalTypes')) {
                    $table->dropColumn('RV_FinalizedRetrievalTypes');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
