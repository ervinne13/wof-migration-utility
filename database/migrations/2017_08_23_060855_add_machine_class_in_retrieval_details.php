<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMachineClassInRetrievalDetails extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblINV_RetrievalToken', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalToken', 'RVT_MachineClass')) {
                    $table->string('RVT_MachineClass', 30)->nullable();
                }
            });

            Schema::table('tblINV_RetrievalPisoToken', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalPisoToken', 'RVPT_MachineClass')) {
                    $table->string('RVPT_MachineClass', 30)->nullable();
                }
            });

            Schema::table('tblINV_RetrievalPisoCoin', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalPisoCoin', 'RVPC_MachineClass')) {
                    $table->string('RVPC_MachineClass', 30)->nullable();
                }
            });

            Schema::table('tblINV_RetrievalFivePesoCoin', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalFivePesoCoin', 'RVFPC_MachineClass')) {
                    $table->string('RVFPC_MachineClass', 30)->nullable();
                }
            });

            Schema::table('tblINV_RetrievalTicket', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalTicket', 'RVTR_MachineClass')) {
                    $table->string('RVTR_MachineClass', 30)->nullable();
                }
            });

            Schema::table('tblINV_RetrievalMeterReading', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalMeterReading', 'RVMR_MachineClass')) {
                    $table->string('RVMR_MachineClass', 30)->nullable();
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

            Schema::table('tblINV_RetrievalToken', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalToken', 'RVT_MachineClass')) {
                    $table->dropColumn('RVT_MachineClass');
                }
            });

            Schema::table('tblINV_RetrievalPisoToken', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalPisoToken', 'RVPT_MachineClass')) {
                    $table->dropColumn('RVPT_MachineClass');
                }
            });
            Schema::table('tblINV_RetrievalPisoCoin', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalPisoCoin', 'RVPC_MachineClass')) {
                    $table->dropColumn('RVPC_MachineClass');
                }
            });
            Schema::table('tblINV_RetrievalFivePesoCoin', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalFivePesoCoin', 'RVFPC_MachineClass')) {
                    $table->dropColumn('RVFPC_MachineClass');
                }
            });
            Schema::table('tblINV_RetrievalTicket', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalTicket', 'RVTR_MachineClass')) {
                    $table->dropColumn('RVTR_MachineClass');
                }
            });
            Schema::table('tblINV_RetrievalMeterReading', function ($table) {
                if (!Schema::hasColumn('tblINV_RetrievalMeterReading', 'RVMR_MachineClass')) {
                    $table->dropColumn('RVMR_MachineClass');
                }
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
