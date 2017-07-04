<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddRetrievalDetailsStatusField extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_RetrievalPisoCoin', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalPisoCoin', 'RVPC_Status')) {
                    $table->string('RVPC_Status', 30)->default("Open");
                }
            });

            Schema::table('tblINV_RetrievalPisoToken', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalPisoToken', 'RVPT_Status')) {
                    $table->string('RVPT_Status', 30)->default("Open");
                }
            });

            Schema::table('tblINV_RetrievalTicket', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalTicket', 'RVTR_Status')) {
                    $table->string('RVTR_Status', 30)->default("Open");
                }
            });

            Schema::table('tblINV_RetrievalToken', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalToken', 'RVT_Status')) {
                    $table->string('RVT_Status', 30)->default("Open");
                }
            });

            Schema::table('tblINV_RetrievalTicketVariance', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalTicketVariance', 'RVTIV_Status')) {
                    $table->string('RVTIV_Status', 30)->default("Open");
                }
            });

            Schema::table('tblINV_RetrievalTokenVariance', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalTokenVariance', 'RVTOV_Status')) {
                    $table->string('RVTOV_Status', 30)->default("Open");
                }
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

            Schema::table('tblINV_RetrievalPisoCoin', function ($table) {
                if (Schema::hasColumn('tblINV_RetrievalPisoCoin', 'RVPC_Status')) {
                    $table->dropColumn('RVPC_Status', 30);
                }
            });

            Schema::table('tblINV_RetrievalPisoToken', function ($table) {
                if (Schema::hasColumn('tblINV_RetrievalPisoToken', 'RVPT_Status')) {
                    $table->dropColumn('RVPT_Status', 30);
                }
            });

            Schema::table('tblINV_RetrievalTicket', function ($table) {
                if (Schema::hasColumn('tblINV_RetrievalTicket', 'RVTR_Status')) {
                    $table->dropColumn('RVTR_Status', 30);
                }
            });

            Schema::table('tblINV_RetrievalToken', function ($table) {
                if (Schema::hasColumn('tblINV_RetrievalToken', 'RVT_Status')) {
                    $table->dropColumn('RVT_Status', 30);
                }
            });

            Schema::table('tblINV_RetrievalTicketVariance', function ($table) {
                if (Schema::hasColumn('tblINV_RetrievalTicketVariance', 'RVTIV_Status')) {
                    $table->dropColumn('RVTIV_Status', 30);
                }
            });

            Schema::table('tblINV_RetrievalTokenVariance', function ($table) {
                if (Schema::hasColumn('tblINV_RetrievalTokenVariance', 'RVTOV_Status')) {
                    $table->dropColumn('RVTOV_Status', 30);
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
