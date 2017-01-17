<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCaRrLiquidation extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        try {
            DB::beginTransaction();

            Schema::table('tblCOM_CA', function ($table) {
                if (!Schema::hasColumn('tblCOM_CA', 'CA_RRBased')) {
                    $table->boolean('CA_RRBased')->default(false);
                }
            });

            DB::statement('DROP TABLE IF EXISTS public."tblCOM_CARRLiquidation";');
            DB::statement('CREATE TABLE public."tblCOM_CARRLiquidation"
                (
                    "CARR_CA_DocNo" character varying(30) NOT NULL,
                    "CARR_RR_DocNo" character varying(30) NOT NULL,                    
                    "CreatedBy" character varying(20),
                    "DateCreated" timestamp without time zone,
                    "ModifiedBy" character varying(20),
                    "DateModified" timestamp without time zone,
                    CONSTRAINT "CARR_RR_DocNo" PRIMARY KEY ("CARR_CA_DocNo", "CARR_RR_DocNo")
                  )
                  WITH (
                    OIDS=FALSE
                  );');
            DB::statement('ALTER TABLE public."tblCOM_CARRLiquidation" OWNER TO postgres;');

            DB::statement('DROP TABLE IF EXISTS public."tblCOM_CARRLiquidationDetail";');
            DB::statement('CREATE TABLE public."tblCOM_CARRLiquidationDetail"
                (
                    "CARRD_CA_DocNo" character varying(30) NOT NULL,
                    "CARRD_RR_DocNo" character varying(30) NOT NULL,
                    "CARRD_LineNo" bigserial,
                    "CARRD_ItemType" character varying(30),
                    "CARRD_ItemNo" character varying(30),
                    "CARRD_ItemDescription" character varying(250),
                    "CARRD_Location" character varying(30),
                    "CARRD_QtyReceived" numeric(12,4),
                    "CARRD_UOM" character varying(30),
                    "CARRD_UnitPrice" numeric(12,4),
                    "CARRD_Total" numeric(12,4),
                    "CARRD_Currency" character varying(20),
                    "CARRD_Comment" text,
                    "CARRD_RefFrom" character varying(30),
                    "CARRD_RefFromLineNo" integer,
                    "CARRD_VAT" character varying(30),
                    "CARRD_WHT" character varying(30),
                    "CARRD_RefTo" character varying(30),
                    "CARRD_RefToLineNo" character varying(30),
                    "CARRD_TotalLCY" numeric(30,12),
                    "CreatedBy" character varying(20),
                    "DateCreated" timestamp without time zone,
                    "ModifiedBy" character varying(20),
                    "DateModified" timestamp without time zone,
                    CONSTRAINT "CARRD_RR_DocNo" PRIMARY KEY ("CARRD_RR_DocNo", "CARRD_LineNo")
                  )
                  WITH (
                    OIDS=FALSE
                  );');
            DB::statement('ALTER TABLE public."tblCOM_CARRLiquidationDetail" OWNER TO postgres;');

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

            DB::statement('DROP TABLE IF EXISTS public."tblCOM_CARRLiquidationDetail";');
            DB::statement('DROP TABLE IF EXISTS public."tblCOM_CARRLiquidation";');

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
