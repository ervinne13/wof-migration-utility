<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddNewApprovalSetup extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        try {
            DB::beginTransaction();

            Schema::dropIfExists('tblCOM_ApprovalSetupApprovers');
            Schema::dropIfExists('tblCOM_ApprovalSetupVariables');
            Schema::dropIfExists('tblCOM_ApprovalSetup');

            Schema::create('tblCOM_ApprovalSetup', function (Blueprint $table) {
                $table->string('AS_Name', 30)->primary();
                $table->string('AS_Description');

                $table->string('CreatedBy', 30);
                $table->timestamp('DateCreated');
                $table->string('ModifiedBy', 30);
                $table->timestamp('DateModified');
            });

            Schema::create('tblCOM_ApprovalSetupVariables', function (Blueprint $table) {
                $table->string('ASV_FK_AS_Name', 30);
                $table->string('ASV_Variable', 30);
                $table->string('ASV_ValidationType', 30);
                $table->string('ASV_ValidationValue', 50);
                $table->string('ASV_ValidationTable', 50);

                $table->string('CreatedBy', 30);
                $table->timestamp('DateCreated');
                $table->string('ModifiedBy', 30);
                $table->timestamp('DateModified');

                $table->primary(['ASV_FK_AS_Name', 'ASV_Variable']);

                $table->foreign('ASV_FK_AS_Name')
                        ->references('AS_Name')
                        ->on('tblCOM_ApprovalSetup')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            });

            //  Approval setup approvers are unique by approval setup name, the approver,
            //  and its conditions. No same approver can exist with the same conditions
            //  conditions defaults to []
            Schema::create('tblCOM_ApprovalSetupApprovers', function (Blueprint $table) {
                $table->string('ASA_FK_AS_Name', 30);
                $table->integer('ASA_Sequence')->unsigned();
                $table->string('ASA_Approver', 30);
                $table->json('ASA_Conditions');
                $table->boolean('ASA_Conditional')->default(false);
                $table->boolean('ASA_Required')->default(false);
                $table->boolean('ASA_Unlimited')->default(false);

                $table->string('CreatedBy', 30);
                $table->timestamp('DateCreated');
                $table->string('ModifiedBy', 30);
                $table->timestamp('DateModified');

                $table->primary(['ASA_FK_AS_Name', 'ASA_Sequence']);

                $table->foreign('ASA_FK_AS_Name')
                        ->references('AS_Name')
                        ->on('tblCOM_ApprovalSetup')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
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
            DB::statement('DROP TABLE if exists "tblCOM_ApprovalSetup" cascade;');
            DB::statement('DROP TABLE if exists "tblCOM_ApprovalSetupApprovers" cascade;');
            DB::statement('DROP TABLE if exists "tblCOM_ApprovalSetupVariables" cascade;');

            DB::statement('CREATE TABLE public."tblCOM_ApprovalSetup"
                    (
                      "AS_FK_NS_Id" character varying(30) NOT NULL,
                      "AS_Sequence" integer NOT NULL,
                      "AS_ApproverID" character varying(30) NOT NULL,
                      "AS_FK_Position_id" character varying(30) NOT NULL,
                      "AS_ApproverDesc" character varying(250),
                      "AS_ConcernedDept" bit(1) NOT NULL,
                      "AS_Unlimited" bit(1),
                      "AS_Required" bit(1),
                      "AS_Amount" numeric(12,4),
                      "CreatedBy" character varying(30),
                      "DateCreated" timestamp without time zone,
                      "ModifiedBy" character varying(30),
                      "DateModified" timestamp without time zone,
                      CONSTRAINT "AS_NS_ID" PRIMARY KEY ("AS_FK_NS_Id", "AS_Sequence", "AS_ApproverID"),
                      CONSTRAINT "PFK_ApprovalSetup_NoSeries" FOREIGN KEY ("AS_FK_NS_Id")
                          REFERENCES public."tblCOM_NoSeries" ("NS_Id") MATCH SIMPLE
                          ON UPDATE CASCADE ON DELETE SET NULL
                    )
                    WITH (
                      OIDS=FALSE
                    );');
            DB::statement('ALTER TABLE public."tblCOM_ApprovalSetup" OWNER to postgres;');

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
