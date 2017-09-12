<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateCashAdvanceParticularField extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        DB::statement('ALTER TABLE "tblCOM_CADetail" ALTER COLUMN "CAD_Particular" TYPE integer USING (trim("CAD_Particular")::integer);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('"tblCOM_CADetail"', function($table) {
            $table->string('"CAD_Particular"', 250)->nullable()->change();
        });
    }

}
