<?php

use App\Models\StoreProfile;
use Illuminate\Database\Migrations\Migration;

class ActivateAccountingLocation extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $accounting            = StoreProfile::find("Acctg");
        $accounting->SP_Active = 1;
        $accounting->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        $accounting            = StoreProfile::find("Acctg");
        $accounting->SP_Active = 0;
        $accounting->save();
    }

}
