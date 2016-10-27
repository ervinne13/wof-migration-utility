<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRefLineNoToAMP extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('tblACC_AMPDetail', function($table) {
            $table->bigInteger('AMPD_RefLineNo')->nullable();
            $table->string('AMPD_RefDescription', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('tblACC_AMPDetail', function($table) {
            $table->dropColumn('AMPD_RefLineNo');
            $table->dropColumn('AMPD_RefDescription');
        });
    }

}
