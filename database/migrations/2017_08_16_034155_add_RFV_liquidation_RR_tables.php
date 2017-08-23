<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRFVLiquidationRRTables extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        // $query = 'CREATE TABLE public."tblACC_RFVRRLiquidationDetail"
        //     (
        //       "RFVRRD_RFV_DocNo" character varying(30) NOT NULL,
        //       "RFVRRD_RR_DocNo" character varying(30) NOT NULL,
        //       "RFVRRD_LineNo" bigserial,
        //       "RFVRRD_ItemType" character varying(30),
        //       "RFVRRD_ItemNo" character varying(30),
        //       "RFVRRD_ItemDescription" character varying(250),
        //       "RFVRRD_Location" character varying(30),
        //       "RFVRRD_QtyReceived" numeric(12,4),
        //       "RFVRRD_UnitPrice" numeric(12,4),
        //       "RFVRRD_Total" numeric(12,4),
        //       "RFVRRD_Currency" character varying(20),
        //       "RFVRRD_Comment" text,
        //       "RFVRRD_RefFrom" character varying(30),
        //       "RFVRRD_RefFromLineNo" integer,
        //       "RFVRRD_VAT" character varying(30),
        //       "RFVRRD_WHT" character varying(30),
        //       "RFVRRD_RefTo" character varying(30),
        //       "RFVRRD_RefToLineNo" character varying(30),
        //       "RFVRRD_TotalLCY" numeric(30,12),
        //       "CreatedBy" character varying(20),
        //       "DateCreated" timestamp without time zone,
        //       "ModifiedBy" character varying(20),
        //       "DateModified" timestamp without time zone,
        //       "RFVRRD_UOM" bigint,
        //       "RFVRRD_VATAmount" numeric(12,4) NOT NULL DEFAULT \'0\'::numeric,
        //       "RFVRRD_Date" date,
        //       "RFVRRD_ExternalDocNo" character varying(100),
        //       "RFVRRD_TIN" character varying(100),
        //       "RFVRRD_NetofVAT" numeric(12,4) NOT NULL DEFAULT \'0\'::numeric,
        //       "RFVRRD_SupplierID" character varying(30),
        //       "RFVRRD_RR_RefFrom" character varying(30),
        //       CONSTRAINT "RFVRRD_RR_DocNo" PRIMARY KEY ("RFVRRD_RR_DocNo", "RFVRRD_LineNo")
        //     )
        //     WITH (
        //       OIDS=FALSE
        //     );';
        // DB::statement($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        // Schema::dropIfExists('tblACC_RFVRRLiquidationDetail');
    }

}
