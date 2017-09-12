<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class FixApvLineNo extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        try {
            DB::beginTransaction();

            DB::statement('DROP TRIGGER IF EXISTS apvheaderamount ON public."tblACC_APVDetail";');
            DB::statement('DROP TRIGGER IF EXISTS lin_no ON public."tblACC_APVDetail";');
            DB::statement('DROP TABLE IF EXISTS public."tblACC_APVDetail";');
            DB::statement('CREATE TABLE public."tblACC_APVDetail"
            (
                "APVD_PFK_DocNo" character varying(30) NOT NULL,
                "APVD_LineNo" bigserial NOT NULL,
                "APVD_ItemType" character varying(30),
                "APVD_ItemNo" character varying(30),
                "APVD_Description" character varying(250),
                "APVD_Location" character varying(30),
                "APVD_SubLocation" character varying(30),
                "APVD_Qty" numeric(12, 4),
                "APVD_UOM" character varying(30),
                "APVD_UnitPrice" numeric(12, 4),
                "APVD_Amount" numeric(12, 4),
                "APVD_AmountLCY" numeric(12, 4),
                "APVD_Currency" character varying(30),
                "APVD_Comment" character varying(250),
                "APVD_RefFrom" character varying(30),
                "APVD_RefTo" character varying(30),
                "APVD_CostCenter" character varying(30),
                "APVD_VAT" character varying(30),
                "APVD_WHT" character varying(30),
                "APVD_BaseCurrency" character varying(30),
                "APVD_LineDiscPerc" numeric(12, 4),
                "APVD_LineDiscAmount" numeric(12, 4),
                "APVD_ExchangeRate" numeric(12, 4),
                "CreatedBy" character varying(20),
                "DateCreated" timestamp without time zone,
                "ModifiedBy" character varying(20),
                "DateModified" timestamp without time zone,
                "APVD_TargetTable" character varying(1000),
                "APVD_RefFromLineNo" bigint,
                CONSTRAINT "APVD_DocNo" PRIMARY KEY ("APVD_LineNo", "APVD_PFK_DocNo"),
                CONSTRAINT "PFK_APVHeader_APVLine" FOREIGN KEY ("APVD_PFK_DocNo")
                    REFERENCES public."tblACC_APVHeader" ("APV_DocNo") MATCH SIMPLE
                    ON UPDATE NO ACTION
                    ON DELETE NO ACTION
            )
            WITH (
                OIDS = FALSE
            )
            TABLESPACE pg_default;');
            DB::statement('ALTER TABLE public."tblACC_APVDetail" OWNER to postgres;');

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

            DB::statement('DROP TRIGGER IF EXISTS apvheaderamount ON public."tblACC_APVDetail";');
            DB::statement('DROP TRIGGER IF EXISTS lin_no ON public."tblACC_APVDetail";');
            DB::statement('DROP TABLE IF EXISTS public."tblACC_APVDetail";');
            DB::statement('CREATE TABLE public."tblACC_APVDetail"
            (
                "APVD_PFK_DocNo" character varying(30) NOT NULL,
                "APVD_LineNo" integer NOT NULL DEFAULT 0,
                "APVD_ItemType" character varying(30),
                "APVD_ItemNo" character varying(30),
                "APVD_Description" character varying(250),
                "APVD_Location" character varying(30),
                "APVD_SubLocation" character varying(30),
                "APVD_Qty" numeric(12, 4),
                "APVD_UOM" character varying(30),
                "APVD_UnitPrice" numeric(12, 4),
                "APVD_Amount" numeric(12, 4),
                "APVD_AmountLCY" numeric(12, 4),
                "APVD_Currency" character varying(30),
                "APVD_Comment" character varying(250),
                "APVD_RefFrom" character varying(30),
                "APVD_RefTo" character varying(30),
                "APVD_CostCenter" character varying(30),
                "APVD_VAT" character varying(30),
                "APVD_WHT" character varying(30),
                "APVD_BaseCurrency" character varying(30),
                "APVD_LineDiscPerc" numeric(12, 4),
                "APVD_LineDiscAmount" numeric(12, 4),
                "APVD_ExchangeRate" numeric(12, 4),
                "CreatedBy" character varying(20),
                "DateCreated" timestamp without time zone,
                "ModifiedBy" character varying(20),
                "DateModified" timestamp without time zone,
                "APVD_TargetTable" character varying(1000),
                "APVD_RefFromLineNo" bigint,
                CONSTRAINT "APVD_DocNo" PRIMARY KEY ("APVD_LineNo", "APVD_PFK_DocNo"),
                CONSTRAINT "PFK_APVHeader_APVLine" FOREIGN KEY ("APVD_PFK_DocNo")
                    REFERENCES public."tblACC_APVHeader" ("APV_DocNo") MATCH SIMPLE
                    ON UPDATE NO ACTION
                    ON DELETE NO ACTION
            )
            WITH (
                OIDS = FALSE
            )
            TABLESPACE pg_default;');
            DB::statement('ALTER TABLE public."tblACC_APVDetail" OWNER to postgres;');
            DB::statement('CREATE TRIGGER apvheaderamount
                BEFORE INSERT OR DELETE OR UPDATE 
                ON public."tblACC_APVDetail"
                FOR EACH ROW
                EXECUTE PROCEDURE apvheaderamount();');
            DB::statement('CREATE TRIGGER lin_no
                BEFORE INSERT
                ON public."tblACC_APVDetail"
                FOR EACH ROW
                EXECUTE PROCEDURE line_no();');

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
