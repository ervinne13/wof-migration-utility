<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSupplierAndCustomerFieldsToUser extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('tblCOM_User', function($table) {
            $table->string('U_SupplierID', 30)->nullable();
            $table->string('U_CustomerID', 30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('tblACC_AMPDetail', function($table) {
            $table->dropColumn('U_SupplierID');
            $table->dropColumn('U_CustomerID');
        });
    }

}
