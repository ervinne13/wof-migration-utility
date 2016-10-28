<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChargeToTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tblCOM_ChargeTo', function($table) {
            $table->bigInteger("CT_Id")->autoIncrement();
            $table->bigInteger("CT_FK_LineNo");
            $table->string("CT_FK_DocNo", 30);
            $table->string("CT_Location", 30);
            $table->decimal("CT_Amount", 12, 4);
            $table->decimal("CT_Percentage", 12, 4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('tblCOM_ChargeTo');
    }

}
