<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddSupplierToBankPostingGroup extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table("tblACC_BankPostingGroup", function($table) {
            $table->string("BPG_COA_FK_SupplierID", 30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('tblACC_BankPostingGroup', function($table) {
            $table->dropColumn('BPG_COA_FK_SupplierID');
        });
    }

}
