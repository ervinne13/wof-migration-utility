<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * php artisan db:seed --class=GenerateSystemGeneratedNumberSeriesEntries
 */
class GenerateSystemGeneratedNumberSeriesEntries extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::statement('TRUNCATE TABLE "tblCOM_SystemGeneratedNoSeries";');

        $getLastUsedNumbersRawQuery = 'SELECT MAX("IM_Item_id") AS "IM_LastNoUsed", "IM_FK_ItemType_id", "IM_FK_Category_id", "IM_FK_SubCategory_id" 
                                        FROM "tblINV_Item" 
                                        WHERE "IM_FK_ItemType_id" IS NOT NULL
                                        GROUP BY "IM_FK_ItemType_id", "IM_FK_Category_id", "IM_FK_SubCategory_id"';

        $lastUsedNumbers = DB::select(DB::raw($getLastUsedNumbersRawQuery));

        $SGNSEntries = [];
        foreach ($lastUsedNumbers AS $lastUsedNumber) {

            $id             = "{$lastUsedNumber->IM_FK_ItemType_id}-{$lastUsedNumber->IM_FK_SubCategory_id}";
            $idLength       = strlen($id);
            $lastNumberUsed = substr($lastUsedNumber->IM_LastNoUsed, $idLength + 1, strlen($lastUsedNumber->IM_LastNoUsed));

            array_push($SGNSEntries, [
                "SGNS_Id"         => $id,
                "SGNS_StartNo"    => 0,
                "SGNS_EndingNo"   => 999999,
                "SGNS_LastNoUsed" => intval($lastNumberUsed),
            ]);
        }

        DB::table('tblCOM_SystemGeneratedNoSeries')->insert($SGNSEntries);
    }

}
