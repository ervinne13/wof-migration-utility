<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSofLocation extends Migration { /**
 * Run the migrations.
 *
 * @return void
 */

    public function up() {
        try {
            DB::beginTransaction();

            // Schema::table('tblCOM_SourceOfFund', function ($table) {
            //     if (!Schema::hasColumn('tblCOM_SourceOfFund', 'SOF_Location')) {
            //         $table->string('SOF_Location', 30);
            //     }
            // });

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

            // Schema::table('tblCOM_SourceOfFund', function ($table) {
            //     if (Schema::hasColumn('tblCOM_SourceOfFund', 'SOF_Location')) {
            //         $table->dropColumn('SOF_Location');
            //     }
            // });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
