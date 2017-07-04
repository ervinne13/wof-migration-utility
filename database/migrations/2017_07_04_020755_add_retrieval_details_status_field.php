<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
                    $table->boolean('RVPC_Status')->default(false);
                }
            });

            Schema::table('tblINV_RetrievalPisoToken', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalPisoToken', 'RVPT_Status')) {
                    $table->boolean('RVPT_Status')->default(false);
                }
            });

            Schema::table('tblINV_RetrievalTicket', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalTicket', 'RVTR_Status')) {
                    $table->boolean('RVTR_Status')->default(false);
                }
            });

            Schema::table('tblINV_RetrievalToken', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalToken', 'RVT_Status')) {
                    $table->boolean('RVT_Status')->default(false);
                }
            });

            Schema::table('tblINV_RetrievalTicketVariance', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalTicketVariance', 'RVTIV_Status')) {
                    $table->boolean('RVTIV_Status')->default(false);
                }
            });

            Schema::table('tblINV_RetrievalTokenVariance', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalTokenVariance', 'RVTOV_Status')) {
                    $table->boolean('RVTOV_Status')->default(false);
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
                    $table->dropColumn('RVPC_Status');
                }
            });

            Schema::table('tblINV_RetrievalPisoToken', function ($table) {
                if (Schema::hasColumn('tblINV_RetrievalPisoToken', 'RVPT_Status')) {
                    $table->dropColumn('RVPT_Status');
                }
            });

            Schema::table('tblINV_RetrievalTicket', function ($table) {
                if (Schema::hasColumn('tblINV_RetrievalTicket', 'RVTR_Status')) {
                    $table->dropColumn('RVTR_Status');
                }
            });

            Schema::table('tblINV_RetrievalToken', function ($table) {
                if (Schema::hasColumn('tblINV_RetrievalToken', 'RVT_Status')) {
                    $table->dropColumn('RVT_Status');
                }
            });

            Schema::table('tblINV_RetrievalTicketVariance', function ($table) {
                if (Schema::hasColumn('tblINV_RetrievalTicketVariance', 'RVTIV_Status')) {
                    $table->dropColumn('RVTIV_Status');
                }
            });

            Schema::table('tblINV_RetrievalTokenVariance', function ($table) {
                if (Schema::hasColumn('tblINV_RetrievalTokenVariance', 'RVTOV_Status')) {
                    $table->dropColumn('RVTOV_Status');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
