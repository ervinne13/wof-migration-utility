<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class UpdateAcctgId extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        DB::table('tblINV_ItemStoreStock')->where('ISS_FK_SP_StoreID', 'Acctg')->delete();
        DB::table('tblINV_StoreProfile')->where('SP_StoreID', 'Acctg')->update(['SP_StoreID' => 'ACCTG']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        DB::table('tblINV_ItemStoreStock')->where('ISS_FK_SP_StoreID', 'ACCTG')->delete();
        DB::table('tblINV_StoreProfile')->where('SP_StoreID', 'ACCTG')->update(['SP_StoreID' => 'Acctg']);
    }

}
