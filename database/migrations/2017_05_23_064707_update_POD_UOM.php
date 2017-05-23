<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePODUOM extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $query = 'alter table "tblCOM_PODetail" alter column "POD_UOM" type bigint using "POD_UOM"::bigint;';
        DB::statement($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        $query = 'alter table "tblCOM_PODetail" alter column "POD_UOM" type character varying(30) using "POD_UOM"::text;';
        DB::statement($query);
    }

}
