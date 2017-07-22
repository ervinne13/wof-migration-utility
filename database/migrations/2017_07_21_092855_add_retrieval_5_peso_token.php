<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRetrieval5PesoToken extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $queryString = '
            CREATE TABLE public."tblINV_RetrievalFivePesoCoin"
            (
              "RVFPC_RV_DocNo" character varying(30) NOT NULL,
              "RVFPC_MachineTag" character varying(30) NOT NULL,
              "RVFPC_LineNo" bigserial,
              "RVFPC_WeekNo" integer NOT NULL,
              "RVFPC_Date" timestamp without time zone NOT NULL,
              "RVFPC_CounterFrom" bigint,
              "RVFPC_CounterTo" bigint,
              "RVFPC_QtyRetrieved" bigint,
              "RVFPC_PisoToken" bigint,
              "RVFPC_MTC" bigint,
              "RVFPC_Remarks" text,
              "CreatedBy" character varying(20),
              "DateCreated" timestamp without time zone,
              "ModifiedBy" character varying(20),
              "DateModified" timestamp without time zone,
              "RVFPC_Partial" boolean NOT NULL DEFAULT false,
              "RVFPC_Status" character varying(30) NOT NULL DEFAULT \'Open\'::character varying,
              CONSTRAINT "RVFPC_RV_DocNo" PRIMARY KEY ("RVFPC_RV_DocNo", "RVFPC_LineNo", "RVFPC_MachineTag"),
              CONSTRAINT "PFK_Retrieval_PisoCoin" FOREIGN KEY ("RVFPC_RV_DocNo")
                  REFERENCES public."tblINV_Retrieval" ("RV_DocNo") MATCH SIMPLE
                  ON UPDATE CASCADE ON DELETE RESTRICT
            )
            WITH (
              OIDS=FALSE
            );
            ';

        DB::statement($queryString);
        DB::statement('ALTER TABLE public."tblINV_RetrievalPisoCoin" OWNER TO postgres;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        DB::statement('DROP TABLE IF EXISTS public."tblINV_RetrievalFivePesoCoin";');
    }

}
