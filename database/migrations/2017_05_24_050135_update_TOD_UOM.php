<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTODUOM extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $query = 'alter table "tblCOM_TODetail" alter column "TOD_UOM" type bigint using "TOD_UOM"::bigint;';
        DB::statement($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        $query = 'alter table "tblCOM_TODetail" alter column "TOD_UOM" type character varying(30) using "TOD_UOM"::text;';
        DB::statement($query);
    }

}
