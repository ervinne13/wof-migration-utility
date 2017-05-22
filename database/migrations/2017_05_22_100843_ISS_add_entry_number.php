<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ISSAddEntryNumber extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_ItemSeriesSummary', function ($table) {

                if (!Schema::hasColumn('tblINV_ItemSeriesSummary', 'ISS_EntryNo')) {
                    $table->integer('ISS_EntryNo')->unsigned();
                    $table->dropForeign('ISS_DocNo');                    
                    $table->primary(["ISS_DocNo", "ISS_LineNo", "ISS_EntryNo"]);
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

            Schema::table('tblINV_ItemSeriesSummary', function ($table) {

                if (Schema::hasColumn('tblINV_ItemSeriesSummary', 'ISS_EntryNo')) {
                    $table->dropPrimary();
                    $table->primary(["ISS_DocNo", "ISS_LineNo"]);
                    $table->dropColumn('ISS_EntryNo');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
