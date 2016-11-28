<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveUnneededFieldsInDocTracking extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();
            DB::statement('TRUNCATE "tblCOM_DocTracking" cascade;');

            Schema::table('tblCOM_DocTracking', function ($table) {
                $table->dropColumn('DT_FK_NSCode');
                $table->dropColumn('DT_Amount');
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
            DB::statement('DROP TABLE if exists "tblCOM_DocTracking" cascade;');

            DB::statement('CREATE TABLE public."tblCOM_DocTracking"
                        (
                          "DT_FK_NSCode" character varying(30) NOT NULL,
                          "DT_DocNo" character varying(30) NOT NULL,
                          "DT_DocDate" timestamp without time zone NOT NULL,
                          "DT_Sender" character varying(30) NOT NULL,
                          "DT_Approver" character varying(30) NOT NULL,
                          "DT_Status" character varying(30) NOT NULL,
                          "DT_DocType" character varying(30),
                          "DT_Location" character varying(30),
                          "DT_EntryDate" timestamp without time zone,
                          "DT_ApprovedBy" character varying(30),
                          "DT_DateApproved" timestamp without time zone,
                          "DT_EntryNo" bigserial,
                          "DT_Unlimited" bit(1),
                          "DT_TargetURL" character varying(250),
                          "DT_Required" bit(1),
                          "DT_Amount" numeric(12,4),
                          "DT_Remarks" character varying(250),
                          "DT_Viewed" bit(1) DEFAULT B\'0\'::"bit",
                          "CreatedBy" character varying(30),
                          "ModifiedBy" character varying(30),
                          "DateCreated" timestamp without time zone,
                          "DateModified" timestamp without time zone,
                          "DT_FK_Department_id" character varying(30),
                          CONSTRAINT "tblCOM_DocTracking_pkey" PRIMARY KEY ("DT_EntryNo"),
                          CONSTRAINT "FKPK_DocTracking_NoSeries" FOREIGN KEY ("DT_FK_NSCode")
                              REFERENCES public."tblCOM_NoSeries" ("NS_Id") MATCH SIMPLE
                              ON UPDATE NO ACTION ON DELETE NO ACTION
                        )
                        WITH (
                          OIDS=FALSE
                        );');
            DB::statement('ALTER TABLE public."tblCOM_DocTracking" OWNER to postgres;');

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
