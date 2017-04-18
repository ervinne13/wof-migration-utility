<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCvDetailsProcess extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {        
        $rawQueryString = '-- Function: public.cvdetailsprocess()
            -- DROP FUNCTION public.cvdetailsprocess();

            CREATE OR REPLACE FUNCTION public.cvdetailsprocess()
              RETURNS trigger AS
            $BODY$

            BEGIN IF (TG_OP = \'DELETE\') THEN 
            UPDATE "tblACC_APVHeader" SET "APV_Status" = \'Posted\' WHERE "APV_DocNo" = OLD."CVD_RefDocNo";
            UPDATE "tblACC_CVHeader" SET "CV_CheckAmount" = "CV_CheckAmount" - OLD."CVD_Amount" WHERE "CV_DocNo" = OLD."CVD_PFK_DocNo";
             RETURN OLD;
             ELSIF (TG_OP = \'INSERT\') THEN 
             UPDATE "tblACC_APVHeader" SET "APV_Status" = \'With CV\' WHERE "APV_DocNo" = NEW."CVD_RefDocNo";
             UPDATE "tblACC_CVHeader" SET "CV_CheckAmount" = "CV_CheckAmount" + NEW."CVD_Amount" WHERE "CV_DocNo" = NEW."CVD_PFK_DocNo"; 
             RETURN NEW;
             END IF;
             END;
             $BODY$
              LANGUAGE plpgsql VOLATILE
              COST 100;           
            ';
        DB::statement($rawQueryString);
               
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        $rawQueryString = '-- Function: public.cvdetailsprocess()
            -- DROP FUNCTION public.cvdetailsprocess();

            CREATE OR REPLACE FUNCTION public.cvdetailsprocess()
              RETURNS trigger AS
            $BODY$

            BEGIN IF (TG_OP = \'DELETE\') THEN 
            UPDATE "tblACC_APVHeader" SET "APV_Status" = \'Approved\' WHERE "APV_DocNo" = OLD."CVD_RefDocNo";
            UPDATE "tblACC_CVHeader" SET "CV_CheckAmount" = "CV_CheckAmount" - OLD."CVD_Amount" WHERE "CV_DocNo" = OLD."CVD_PFK_DocNo";
             RETURN OLD;
             ELSIF (TG_OP = \'INSERT\') THEN 
             UPDATE "tblACC_APVHeader" SET "APV_Status" = \'With CV\' WHERE "APV_DocNo" = NEW."CVD_RefDocNo";
             UPDATE "tblACC_CVHeader" SET "CV_CheckAmount" = "CV_CheckAmount" + NEW."CVD_Amount" WHERE "CV_DocNo" = NEW."CVD_PFK_DocNo"; 
             RETURN NEW;
             END IF;
             END;
             $BODY$
              LANGUAGE plpgsql VOLATILE
              COST 100;
            ';

        DB::statement($rawQueryString);
    }

}
