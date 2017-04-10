<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTcostSetupTables extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            DB::statement('DROP TABLE IF EXISTS public."tblINV_ConditionFactor";');
            DB::statement('CREATE TABLE public."tblINV_ConditionFactor"
                    (
                      "CF_ConditionFactor" numeric(30, 12) NOT NULL,
                      "CF_ActualCondition" character varying(100) NOT NULL,
                      "CF_LengthOfUse" character varying(30) NOT NULL,
                      "CF_Months" integer NOT NULL,
                      "CreatedBy" character varying(30),
                      "DateCreated" timestamp without time zone,
                      "ModifiedBy" character varying(30),
                      "DateModified" timestamp without time zone,
                      CONSTRAINT "tblINV_ConditionFactor_pkey" PRIMARY KEY ("CF_ConditionFactor")
                    )
                    WITH (
                      OIDS=FALSE
                    );');
            DB::statement('ALTER TABLE public."tblINV_ConditionFactor" OWNER to postgres;');

            DB::statement('DROP TABLE IF EXISTS public."tblINV_ItemMarketPrice";');
            DB::statement('CREATE TABLE public."tblINV_ItemMarketPrice"
                    (
                      "IMP_Id" bigserial NOT NULL,
                      "IMP_ItemNo"  character varying(30) NOT NULL,
                      "IMP_Currency" integer NOT NULL,
                      "IMP_Price" numeric(10, 4) NOT NULL,                      
                      "CreatedBy" character varying(30),
                      "DateCreated" timestamp without time zone,
                      "ModifiedBy" character varying(30),
                      "DateModified" timestamp without time zone,
                      CONSTRAINT "tblINV_ItemMarketPrice_pkey" PRIMARY KEY ("IMP_Id")
                    )
                    WITH (
                      OIDS=FALSE
                    );');
            DB::statement('ALTER TABLE public."tblINV_ItemMarketPrice" OWNER to postgres;');

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
        DB::statement('DROP TABLE IF EXISTS public."tblINV_ConditionFactor";');
        DB::statement('DROP TABLE IF EXISTS public."tblINV_ItemMarketPrice";');
    }

}
