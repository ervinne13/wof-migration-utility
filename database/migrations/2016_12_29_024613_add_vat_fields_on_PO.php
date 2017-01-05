<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVatFieldsOnPO extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('tblCOM_PODetail', function (Blueprint $table) {
            $table->decimal("POD_VATAmount", 12, 4)->default(0);
            $table->decimal("POD_NetOfVAT", 12, 4)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('tblCOM_PODetail', function (Blueprint $table) {
            $table->dropColumn("POD_VATAmount");
            $table->dropColumn("POD_NetOfVAT");
        });
    }

}
