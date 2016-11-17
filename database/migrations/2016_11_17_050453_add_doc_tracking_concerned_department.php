<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDocTrackingConcernedDepartment extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table("tblCOM_DocTracking", function($table) {
            $table->string("DT_FK_Department_id", 30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('tblCOM_DocTracking', function($table) {
            $table->dropColumn('DT_FK_Department_id');
        });
    }

}
