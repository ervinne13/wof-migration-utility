<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePOLDUOM extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $query = 'alter table "tblCOM_POLDetail" alter column "POLD_UOM" type bigint using "POLD_UOM"::bigint;';
        DB::statement($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        $query = 'alter table "tblCOM_POLDetail" alter column "POLD_UOM" type character varying(30) using "POLD_UOM"::text;';
        DB::statement($query);
    }

}
