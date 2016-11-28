<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewModuleApprovalSetup extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        try {
            DB::beginTransaction();

            Schema::dropIfExists('tblCOM_ModuleApprovalSetup');
            Schema::dropIfExists('tblCOM_ModuleApprovalSetupVariables');

            Schema::create('tblCOM_ModuleApprovalSetup', function (Blueprint $table) {
                $table->bigInteger('MAS_FK_M_Module_id')->unsigned();
//                $table->string('MAS_ApprovalSource', 30);
                $table->string('MAS_FK_AS_Name', 30);
                $table->string('MAS_HeaderTableName', 40);
                $table->string('MAS_DetailTableName', 40);

                $table->string('CreatedBy', 30);
                $table->timestamp('DateCreated');
                $table->string('ModifiedBy', 30);
                $table->timestamp('DateModified');

                $table->primary(['MAS_FK_M_Module_id']);

                $table->foreign('MAS_FK_AS_Name')
                        ->references('AS_Name')
                        ->on('tblCOM_ApprovalSetup')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            });

            Schema::create('tblCOM_ModuleApprovalSetupVariables', function (Blueprint $table) {
                $table->bigInteger('MASV_FK_M_Module_id')->unsigned();
                $table->string('MASV_Variable', 30);
                $table->string('MASV_SourceType', 30);
                $table->string('MASV_SourceOrValue');

                $table->string('CreatedBy', 30);
                $table->timestamp('DateCreated');
                $table->string('ModifiedBy', 30);
                $table->timestamp('DateModified');

                $table->primary(['MASV_FK_M_Module_id', 'MASV_Variable']);

                $table->foreign('MASV_FK_M_Module_id')
                        ->references('MAS_FK_M_Module_id')
                        ->on('tblCOM_ModuleApprovalSetup')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');

//                $table->foreign('MASV_Variable')
//                        ->references('ASV_FK_AS_Name')
//                        ->on('tblCOM_ApprovalSetupVariables')
//                        ->onDelete('cascade')
//                        ->onUpdate('cascade');
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

            Schema::dropIfExists('tblCOM_ModuleApprovalSetupVariables');
            Schema::dropIfExists('tblCOM_ModuleApprovalSetup');

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
