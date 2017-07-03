<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPartialRetrievalMarkersToRTVDetails extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_RetrievalPisoCoin', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalPisoCoin', 'RVPC_Partial')) {
                    $table->boolean('RVPC_Partial')->default(false);
                }
            });

            Schema::table('tblINV_RetrievalPisoToken', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalPisoToken', 'RVPT_Partial')) {
                    $table->boolean('RVPT_Partial')->default(false);
                }
            });

            Schema::table('tblINV_RetrievalTicket', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalTicket', 'RVTR_Partial')) {
                    $table->boolean('RVTR_Partial')->default(false);
                }
            });

            Schema::table('tblINV_RetrievalToken', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalToken', 'RVT_Partial')) {
                    $table->boolean('RVT_Partial')->default(false);
                }
            });

            Schema::table('tblINV_RetrievalTicketVariance', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalTicketVariance', 'RVTIV_Partial')) {
                    $table->boolean('RVTIV_Partial')->default(false);
                }
            });

            Schema::table('tblINV_RetrievalTokenVariance', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalTokenVariance', 'RVTOV_Partial')) {
                    $table->boolean('RVTOV_Partial')->default(false);
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
                if (Schema::hasColumn('tblINV_RetrievalPisoCoin', 'RVPC_Partial')) {
                    $table->dropColumn('RVPC_Partial');
                }
            });

            Schema::table('tblINV_RetrievalPisoToken', function ($table) {
                if (Schema::hasColumn('tblINV_RetrievalPisoToken', 'RVPT_Partial')) {
                    $table->dropColumn('RVPT_Partial');
                }
            });

            Schema::table('tblINV_RetrievalTicket', function ($table) {
                if (Schema::hasColumn('tblINV_RetrievalTicket', 'RVTR_Partial')) {
                    $table->dropColumn('RVTR_Partial');
                }
            });

            Schema::table('tblINV_RetrievalToken', function ($table) {
                if (Schema::hasColumn('tblINV_RetrievalToken', 'RVT_Partial')) {
                    $table->dropColumn('RVT_Partial');
                }
            });

            Schema::table('tblINV_RetrievalTicketVariance', function ($table) {
                if (Schema::hasColumn('tblINV_RetrievalTicketVariance', 'RVTIV_Partial')) {
                    $table->dropColumn('RVTIV_Partial');
                }
            });

            Schema::table('tblINV_RetrievalTokenVariance', function ($table) {
                if (Schema::hasColumn('tblINV_RetrievalTokenVariance', 'RVTOV_Partial')) {
                    $table->dropColumn('RVTOV_Partial');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
