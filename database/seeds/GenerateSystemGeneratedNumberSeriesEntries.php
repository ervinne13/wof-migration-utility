<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        foreach() {
            
        }
    }

}
