
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateISESummaryStatus extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            $query = 'ALTER TABLE "tblINV_ItemSeriesSummary" DROP COLUMN "ISS_Status";';
            DB::statement($query);

            Schema::table('tblINV_ItemSeriesSummary', function ($table) {
                $table->string('ISS_Status', 30)->default('Open');
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

                if (Schema::hasColumn('tblINV_ItemSeriesSummary', 'ISS_Status')) {
                    $table->dropColumn('ISS_Status');
                }
            });

            $query = 'ALTER TABLE "tblINV_ItemSeriesSummary" ADD COLUMN "ISS_Status" bit(1);';
            DB::statement($query);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
