<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateDCMTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        try {
            DB::beginTransaction();

            DB::statement('DROP TABLE if exists "tblACC_DCMDetail" cascade;');
            DB::statement('DROP TABLE if exists "tblACC_DCMHeader" cascade;');

            Schema::create('tblACC_DCMHeader', function (Blueprint $table) {
                $table->string("DCM_DocNo", 30);
                $table->timestamp("DCM_DocDate");
                $table->string("DCM_AccountType", 30);
                $table->string("DCM_AccountNo", 30);
                $table->string("DCM_AccountName", 30);
                $table->string("DCM_Remarks", 250);
                $table->string("DCM_RefDocNo", 30);
                $table->string("DCM_ExtDocNo", 30);
                $table->string("DCM_Status", 20);
                $table->decimal("DCM_Amount", 12, 4);
                $table->string("DCM_AccountPostingGroup", 30);

                $table->string("CreatedBy", 20);
                $table->timestamp("DateCreated");
                $table->string("ModifiedBy", 20);
                $table->timestamp("DateModified", 20);

                $table->primary(['DCM_DocNo']);
            });

            Schema::create('tblACC_DCMDetail', function (Blueprint $table) {
                $table->bigIncrements("DCMD_LineNo");   //  automatically assienged as primary key
                $table->string("DCMD_DCM_DocNo", 30);
                $table->timestamp("DCMD_PostingDate");
                $table->string("DCMD_ItemType", 30);
                $table->string("DCMD_ItemNo", 30);
                $table->string("DCMD_ItemDescription", 30);
                $table->decimal("DCMD_Qty", 12, 4);
                $table->integer("DCMD_UOM");
                $table->decimal("DCMD_Amount", 12, 4);
                $table->decimal("DCMD_Total", 12, 4);
                $table->string("DCMD_Location", 30);
                $table->string("DCMD_CPC", 20);
                $table->string("DCMD_Comment", 250);

                $table->string("CreatedBy", 20);
                $table->timestamp("DateCreated");
                $table->string("ModifiedBy", 20);
                $table->timestamp("DateModified", 20);
            });

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
            DB::statement('DROP TABLE if exists "tblACC_DCMDetail" cascade;');
            DB::statement('DROP TABLE if exists "tblACC_DCMHeader" cascade;');

            DB::statement('
                    CREATE TABLE public."tblACC_DCMHeader"
                    (
                      "DCM_DocNo" character varying(30) NOT NULL,
                      "DCM_DocDate" timestamp without time zone,
                      "DCM_AccountNo" character varying(30),
                      "DCM_AccountName" character varying(100),
                      "DCM_Remarks" character varying(250),
                      "DCM_RefDocNo" character varying(30),
                      "DCM_ExtDocNo" character varying(30),
                      "DCM_Status" character varying(20),
                      "DCM_Amount" numeric(12,4),
                      "CreatedBy" character varying(20),
                      "DateCreated" timestamp without time zone,
                      "ModifiedBy" character varying(20),
                      "DateModified" timestamp without time zone,
                      "DCM_CustomerID" character varying(30),
                      "DCM_CustomerName" character varying(250),
                      CONSTRAINT "DCM_DocNo" PRIMARY KEY ("DCM_DocNo")
                    )
                    WITH (
                      OIDS=FALSE
                    );');

            DB::statement('ALTER TABLE public."tblACC_DCMHeader" OWNER TO postgres;');

            DB::statement('
                    CREATE TABLE public."tblACC_DCMDetail"
                    (
                      "DCMD_FK_DocNo" character varying(30) NOT NULL,
                      "DCMD_LineNo" bigint NOT NULL,
                      "DCMD_DCMType" character varying(30),
                      "DCMD_Description" character varying(100),
                      "DCMD_Amount" numeric(12,4),
                      "DCMD_CPC" character varying(20),
                      "DCMD_Comment" character varying(250),
                      "CreatedBy" character varying(20),
                      "DateCreated" timestamp without time zone,
                      "ModifiedBy" character varying(20),
                      "DateModified" timestamp without time zone,
                      "DCMD_Location" character varying(30),
                      "DCMD_AppliesToDocType" character varying(100),
                      "DCMD_AppliesToDocNo" character varying(30),
                      CONSTRAINT "Key10" PRIMARY KEY ("DCMD_FK_DocNo", "DCMD_LineNo"),
                      CONSTRAINT "PFK_DCMHeader_Detail" FOREIGN KEY ("DCMD_FK_DocNo")
                          REFERENCES public."tblACC_DCMHeader" ("DCM_DocNo") MATCH SIMPLE
                          ON UPDATE NO ACTION ON DELETE NO ACTION
                    )
                    WITH (
                      OIDS=FALSE
                    );');

            DB::statement('ALTER TABLE public."tblACC_DCMDetail" OWNER TO postgres;');

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
