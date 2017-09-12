<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLastClosingDateToCompany extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('tblCOM_Company', function($table) {
            $table->timestamp('COM_LastClosingDate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
         Schema::table('tblCOM_Company', function($table) {
            $table->dropColumn('COM_LastClosingDate');
        });
    }

}
