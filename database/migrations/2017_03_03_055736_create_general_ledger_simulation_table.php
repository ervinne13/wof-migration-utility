<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralLedgerSimulationTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        try {
            DB::beginTransaction();

            DB::statement('DROP TABLE IF EXISTS public."tblACC_GLEntrySimulation";');
            DB::statement('CREATE TABLE public."tblACC_GLEntrySimulation"
                (
                  "GL_EntryNo" bigserial NOT NULL,
                  "GL_DocType" character varying(30),
                  "GL_DocNo" character varying(30),
                  "GL_DocDate" timestamp without time zone,
                  "GL_AccountType" character varying(30),
                  "GL_AccountID" character varying(30),
                  "GL_AccountName" character varying(100),
                  "GL_Debit" numeric(12,4),
                  "GL_Credit" numeric(12,4),
                  "GL_Amount" numeric(12,4),
                  "GL_CPC" character varying(30),
                  "GL_FK_BT_BookID" character varying(20),
                  "GL_BalAccountType" character varying(30),
                  "GL_BalAccountNo" character varying(30),
                  "GL_BalAccountName" character varying(100),
                  "GL_Status" character varying(20),
                  "GL_PostedBy" character varying(20),
                  "GL_DatePosted" timestamp without time zone,
                  "GL_DateCreated" timestamp without time zone,
                  "GL_Company" character varying(30),
                  CONSTRAINT "tblACC_GLEntrySimulation_pkey" PRIMARY KEY ("GL_EntryNo")
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
        DB::statement('DROP TABLE IF EXISTS public."tblACC_GLEntrySimulation";');
    }

}
