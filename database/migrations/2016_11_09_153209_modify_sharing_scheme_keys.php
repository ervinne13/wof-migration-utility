<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifySharingSchemeKeys extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        try {
            DB::beginTransaction();

            DB::statement('DROP TABLE IF EXISTS public."tblINV_StoreProfile_SharingScheme";');
            DB::statement('CREATE TABLE public."tblINV_StoreProfile_SharingScheme"
                (
                  "SP_StoreID" character varying(30) NOT NULL,
                  "SP_Gross" bit(1) NOT NULL,
                  "SP_MachineCategory" character varying(100) NOT NULL,
                  "SP_Percentage" numeric(12,4) NOT NULL,
                  "CreatedBy" character varying(20),
                  "DateCreated" timestamp without time zone,
                  "ModifiedBy" character varying(20),
                  "DateModified" timestamp without time zone,
                  CONSTRAINT "SP_StoreID_SharingScheme" PRIMARY KEY ("SP_StoreID", "SP_MachineCategory"),
                  CONSTRAINT "PFK_StoreProfie_SharingScheme" FOREIGN KEY ("SP_StoreID")
                      REFERENCES public."tblINV_StoreProfile" ("SP_StoreID") MATCH SIMPLE
                      ON UPDATE CASCADE ON DELETE RESTRICT
                )
                WITH (
                  OIDS=FALSE
                );');
            DB::statement('ALTER TABLE public."tblINV_StoreProfile_SharingScheme" OWNER to postgres;');

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


        try {
            DB::beginTransaction();

            DB::statement('DROP TABLE IF EXISTS public."tblINV_StoreProfile_SharingScheme";');
            DB::statement('CREATE TABLE public."tblINV_StoreProfile_SharingScheme"
                (
                  "SP_StoreID" character varying(30) NOT NULL,
                  "SP_Gross" bit(1) NOT NULL,
                  "SP_MachineCategory" character varying(100) NOT NULL,
                  "SP_Percentage" numeric(12,4) NOT NULL,
                  "CreatedBy" character varying(20),
                  "DateCreated" timestamp without time zone,
                  "ModifiedBy" character varying(20),
                  "DateModified" timestamp without time zone,
                  CONSTRAINT "SP_StoreID_SharingScheme" PRIMARY KEY ("SP_StoreID"),
                  CONSTRAINT "PFK_StoreProfie_SharingScheme" FOREIGN KEY ("SP_StoreID")
                      REFERENCES public."tblINV_StoreProfile" ("SP_StoreID") MATCH SIMPLE
                      ON UPDATE CASCADE ON DELETE RESTRICT
                )
                WITH (
                  OIDS=FALSE
                );');
            DB::statement('ALTER TABLE public."tblINV_StoreProfile_SharingScheme" OWNER to postgres;');

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
