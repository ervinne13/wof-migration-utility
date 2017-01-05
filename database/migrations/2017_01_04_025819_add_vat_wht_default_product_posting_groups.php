<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVatWhtDefaultProductPostingGroups extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::table('tblACC_VATBusPostingGroup', function ($table) {
                if (!Schema::hasColumn('tblACC_VATBusPostingGroup', 'VBPG_Default_FK_VPPG_Code')) {
                    $table->string('VBPG_Default_FK_VPPG_Code', 30)->nullable();

                    $table->foreign('VBPG_Default_FK_VPPG_Code')
                            ->references('VPPG_Code')
                            ->on('tblACC_VATProdPostingGroup')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                }
            });

            Schema::table('tblACC_WHTBusPostingGroup', function ($table) {
                if (!Schema::hasColumn('tblACC_WHTBusPostingGroup', 'WBPG_Default_FK_WPPG_Code')) {
                    $table->string('WBPG_Default_FK_WPPG_Code', 30)->nullable();

                    $table->foreign('WBPG_Default_FK_WPPG_Code')
                            ->references('WPPG_Code')
                            ->on('tblACC_WHTProdPostingGroup')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
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

            Schema::table('tblACC_VATBusPostingGroup', function ($table) {
                $table->dropColumn('VBPG_Default_FK_VPPG_Code');
            });

            Schema::table('tblACC_WHTBusPostingGroup', function ($table) {
                $table->dropColumn('WBPG_Default_FK_WPPG_Code');
            });

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
