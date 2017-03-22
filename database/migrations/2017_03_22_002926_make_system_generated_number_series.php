<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeSystemGeneratedNumberSeries extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //tblCOM_NoSeries

        Schema::create('tblCOM_SystemGeneratedNoSeries', function (Blueprint $table) {
            $table->string('SGNS_Id');
            $table->integer('SGNS_StartNo')->default(0);
            $table->integer('SGNS_EndingNo')->default(999999);
            $table->integer('SGNS_LastNoUsed')->default(0);

            $table->primary('SGNS_Id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('tblCOM_SystemGeneratedNoSeries');
    }

}
