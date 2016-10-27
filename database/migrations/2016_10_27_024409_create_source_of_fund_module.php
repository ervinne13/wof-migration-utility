<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateSourceOfFundModule extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tblCOM_SourceOfFund', function($table) {
            $table->string('SOF_Name', 30);
            $table->string('SOF_GLAccount', 30);
            $table->string('CreatedBy', 30);
            $table->timestamp('DateCreated');
            $table->string('ModifiedBy', 30);
            $table->timestamp('DateModified');
        });

        Schema::table('tblCOM_SourceOfFund', function($table) {
            $table->primary('SOF_Name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('tblCOM_SourceOfFund');
    }

}
