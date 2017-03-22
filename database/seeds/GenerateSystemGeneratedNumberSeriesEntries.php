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
        $getLastUsedNumbersRawQuery = 'SELECT MAX("IM_Item_id") AS "IM_LastNoUsed", "IM_FK_ItemType_id", "IM_FK_Category_id", "IM_FK_SubCategory_id" 
                                        FROM "tblINV_Item" 
                                        WHERE "IM_FK_ItemType_id" IS NOT NULL
                                        GROUP BY "IM_FK_ItemType_id", "IM_FK_Category_id", "IM_FK_SubCategory_id"';

        $lastUsedNumbers = DB::select(DB::raw($getLastUsedNumbersRawQuery));

        $SGNSEntries = [];
        foreach ($lastUsedNumbers AS $lastUsedNumber) {

            $id = "{$lastUsedNumber->IM_FK_ItemType_id}-{$lastUsedNumber->IM_FK_Category_id}-{$lastUsedNumber->IM_FK_SubCategory_id}";

            array_push($SGNSEntries, [
                "SGNS_Id"         => $id,
                "SGNS_StartNo"    => 0,
                "SGNS_EndingNo"   => 999999,
                "SGNS_LastNoUsed" => 0,
            ]);
        }

        DB::table('tblCOM_SystemGeneratedNoSeries')->insert($SGNSEntries);
    }

}
