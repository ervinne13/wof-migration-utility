<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixRpLineNo extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            DB::statement('DROP TRIGGER IF EXISTS rpheaderamount ON public."tblACC_RPDetails";');
            DB::statement('DROP TRIGGER IF EXISTS add ON public."tblACC_RPDetails";');
            DB::statement('DROP TRIGGER IF EXISTS line_no ON public."tblACC_RPDetails";');
            DB::statement('DROP TABLE IF EXISTS public."tblACC_RPDetails";');
            DB::statement('CREATE TABLE public."tblACC_RPDetails"
                    (
                        "RPD_PFK_DocNo" character varying(30) NOT NULL,
                        "RPD_LineNo" bigserial NOT NULL,
                        "RPD_ItemType" character varying(30) ,
                        "RPD_ItemNo" character varying(30) ,
                        "RPD_ItemDescription" character varying(250) ,
                        "RPD_Qty" numeric(12, 4),
                        "RPD_UnitPrice" numeric(12, 4),
                        "RPD_Amount" numeric(12, 4),
                        "RPD_AmountLCY" numeric(12, 4),
                        "RPD_ExchangeRate" numeric(12, 4),
                        "RPD_RefTo" character varying(30),
                        "RPD_CPC" character varying(30) ,
                        "RPD_Comment" character varying(250) ,
                        "RPD_VAT" character varying(30) ,
                        "RPD_WHT" character varying(30) ,
                        "CreatedBy" character varying(30) ,
                        "DateCreated" timestamp without time zone,
                        "ModifiedBy" character varying(30) ,
                        "DateModified" timestamp without time zone,
                        "RPD_Status" character varying(30),
                        CONSTRAINT " tblACC_RPDetails_pkey" PRIMARY KEY ("RPD_LineNo", "RPD_PFK_DocNo"),
                        CONSTRAINT " tblACC_RPDetails_RPD_PFK_DocNo_fkey" FOREIGN KEY ("RPD_PFK_DocNo")
                            REFERENCES public."tblACC_RPHeader" ("RPH_DocNo") MATCH SIMPLE
                            ON UPDATE CASCADE
                            ON DELETE RESTRICT
                    )
                    WITH (
                        OIDS = FALSE
                    )
                    TABLESPACE pg_default;');
            DB::statement('ALTER TABLE public."tblACC_RPDetails" OWNER to postgres;');
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

            DB::statement('DROP TRIGGER IF EXISTS rpheaderamount ON public."tblACC_RPDetails";');
            DB::statement('DROP TRIGGER IF EXISTS add ON public."tblACC_RPDetails";');
            DB::statement('DROP TRIGGER IF EXISTS line_no ON public."tblACC_RPDetails";');
            DB::statement('DROP TABLE IF EXISTS public."tblACC_RPDetails";');
            DB::statement('CREATE TABLE public."tblACC_RPDetails"
                    (
                        "RPD_PFK_DocNo" character varying(30) NOT NULL,
                        "RPD_LineNo" bigint NOT NULL,
                        "RPD_ItemType" character varying(30) ,
                        "RPD_ItemNo" character varying(30) ,
                        "RPD_ItemDescription" character varying(250) ,
                        "RPD_Qty" numeric(12, 4),
                        "RPD_UnitPrice" numeric(12, 4),
                        "RPD_Amount" numeric(12, 4),
                        "RPD_AmountLCY" numeric(12, 4),
                        "RPD_ExchangeRate" numeric(12, 4),
                        "RPD_RefTo" character varying(30),
                        "RPD_CPC" character varying(30) ,
                        "RPD_Comment" character varying(250) ,
                        "RPD_VAT" character varying(30) ,
                        "RPD_WHT" character varying(30) ,
                        "CreatedBy" character varying(30) ,
                        "DateCreated" timestamp without time zone,
                        "ModifiedBy" character varying(30) ,
                        "DateModified" timestamp without time zone,
                        "RPD_Status" character varying(30),
                        CONSTRAINT " tblACC_RPDetails_pkey" PRIMARY KEY ("RPD_LineNo", "RPD_PFK_DocNo"),
                        CONSTRAINT " tblACC_RPDetails_RPD_PFK_DocNo_fkey" FOREIGN KEY ("RPD_PFK_DocNo")
                            REFERENCES public."tblACC_RPHeader" ("RPH_DocNo") MATCH SIMPLE
                            ON UPDATE CASCADE
                            ON DELETE RESTRICT
                    )
                    WITH (
                        OIDS = FALSE
                    )
                    TABLESPACE pg_default;');
            DB::statement('ALTER TABLE public."tblACC_RPDetails" OWNER to postgres;');
            DB::statement('CREATE TRIGGER add
                BEFORE INSERT OR DELETE OR UPDATE 
                ON public."tblACC_RPDetails"
                FOR EACH ROW
                EXECUTE PROCEDURE line_no();');
            DB::statement('CREATE TRIGGER rpheaderamount
                BEFORE INSERT
                ON public."tblACC_RPDetails"
                FOR EACH ROW
                EXECUTE PROCEDURE rpheaderamount();');

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
