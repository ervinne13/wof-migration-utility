<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPostingGroupsToParticulars extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('tblCOM_Particular', function($table) {
            $table->string('P_VATPostingGroup', 30)->nullable();
            $table->string('P_WHTPostingGroup', 30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('tblCOM_Particular', function($table) {
            $table->dropColumn('P_VATPostingGroup');
            $table->dropColumn('P_WHTPostingGroup');
        });
    }

}
