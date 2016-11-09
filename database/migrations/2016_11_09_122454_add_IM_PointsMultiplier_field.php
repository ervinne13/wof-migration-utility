<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddIMPointsMultiplierField extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('tblINV_Item', function($table) {
            $table->double('IM_PointsMultiplier', 10, 4)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('tblINV_Item', function($table) {
            $table->dropColumn('IM_PointsMultiplier');
        });
    }

}
