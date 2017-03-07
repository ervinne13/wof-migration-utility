<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToldetailToldRefFromLineNo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('tblCOM_TOLDetail', function (Blueprint $table) {
            $table->integer("TOLD_RefFromLineNo")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('tblCOM_TOLDetail', function (Blueprint $table) {
            $table->dropColumn("TOLD_RefFromLineNo");
        });
    }
}
