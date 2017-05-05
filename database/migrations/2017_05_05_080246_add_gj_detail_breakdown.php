<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGjDetailBreakdown extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            DB::statement('DROP TABLE IF EXISTS public."tblACC_GJDetailBreakdown";');
            DB::statement('
                CREATE TABLE public."tblACC_GJDetailBreakdown"
                (
                  "GJDB_PFK_DocNo" character varying(30) NOT NULL, 
                  "GJDB_LineNo" bigint NOT NULL,                  
                  "GJDB_AccountType" character varying(30),
                  "GJDB_AccountNo" character varying(30),
                  "GJDB_AccountName" character varying(100),
                  "GJDB_Amount" numeric(12,4),
                  "GJDB_Type" character varying(30)
                )
                WITH (
                  OIDS=FALSE
                );');
            DB::statement('ALTER TABLE public."tblACC_GJDetailBreakdown" OWNER to postgres;');

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
        DB::statement('DROP TABLE IF EXISTS public."tblACC_GJDetailBreakdown";');
    }

}
