<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdvancesAccountToSupplierPostingGroup extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table("tblACC_SupplierPostingGroup", function($table) {
            $table->string("SPG_COA_FK_AdvancesAccountNo", 30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('tblACC_SupplierPostingGroup', function($table) {
            $table->dropColumn('SPG_COA_FK_AdvancesAccountNo');
        });
    }

}
