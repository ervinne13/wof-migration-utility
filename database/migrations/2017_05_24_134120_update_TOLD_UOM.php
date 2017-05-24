<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTOLDUOM extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $query = 'alter table "tblCOM_TOLDetail" alter column "TOLD_UOM" type bigint using "TOLD_UOM"::bigint;';
        DB::statement($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        $query = 'alter table "tblCOM_TOLDetail" alter column "TOLD_UOM" type character varying(30) using "TOLD_UOM"::text;';
        DB::statement($query);
    }

}
