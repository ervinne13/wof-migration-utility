<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemUomSubLocationStock extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            DB::statement('DROP TABLE IF EXISTS public."tblINV_ItemUOMSubLocationStock";');
            DB::statement('CREATE TABLE public."tblINV_ItemUOMSubLocationStock"
                    (
                      "IUSLS_FK_IM_Item_id" character(30) NOT NULL,
                      "IUSLS_FK_UOM" bigint NOT NULL,
                      "IUSLS_FK_SP_StoreID" character(30) NOT NULL,
                      "IUSLS_SubLocation" character(30) NOT NULL,
                      "IUSLS_FK_IM_OnHandQty" character(30),
                      "CreatedBy" character varying(30),
                      "DateCreated" timestamp without time zone,
                      "ModifiedBy" character varying(30),
                      "DateModified" timestamp without time zone,
                      CONSTRAINT "tblINV_ItemUOMSubLocationStock_pkey" PRIMARY KEY ("IUSLS_FK_IM_Item_id", "IUSLS_FK_UOM", "IUSLS_FK_SP_StoreID", "IUSLS_SubLocation"),
                      CONSTRAINT "tblINV_ItemUOMSubLocationStock_IUSLS_FK_IM_Item_id_fkey" FOREIGN KEY ("IUSLS_FK_IM_Item_id")
                          REFERENCES public."tblINV_Item" ("IM_Item_id") MATCH SIMPLE
                          ON UPDATE NO ACTION ON DELETE NO ACTION,
                      CONSTRAINT "tblINV_ItemUOMSubLocationStock_IUSLS_FK_SP_StoreID_fkey" FOREIGN KEY ("IUSLS_FK_SP_StoreID")
                          REFERENCES public."tblINV_StoreProfile" ("SP_StoreID") MATCH SIMPLE
                          ON UPDATE NO ACTION ON DELETE NO ACTION,
                      CONSTRAINT "tblINV_ItemUOMSubLocationStock_IUSLS_FK_UOM" FOREIGN KEY ("IUSLS_FK_UOM")
                          REFERENCES public."tblCOM_AttributeDetail" ("AD_Id") MATCH SIMPLE
                          ON UPDATE NO ACTION ON DELETE NO ACTION
                    )
                    WITH (
                      OIDS=FALSE
                    );');
            DB::statement('ALTER TABLE public."tblACC_GLEntrySimulation" OWNER to postgres;');

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        DB::statement('DROP TABLE IF EXISTS public."tblINV_ItemUOMSubLocationStock";');
    }

}
