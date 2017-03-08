<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldRqlocationRqlAssetid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
         Schema::table('tblINV_RQLDetail', function (Blueprint $table) {
            $table->string("RQLD_AssetID", 30)->nullable();
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
            $table->dropColumn("RQLD_AssetID");
        });
    }
}
