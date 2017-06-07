<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddItemSeriesStockTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tblINV_ItemSeriesStock', function (Blueprint $table) {
            $table->string('ISS_IM_Item_id');
            $table->bigInteger('ISS_SeriesFrom');
            $table->bigInteger('ISS_SeriesTo');
            $table->string('ISS_Location', 30);
            $table->string('ISS_SubLocation', 30);
            $table->string('ISS_AssetID', 30)->nullable();
            $table->string('ISS_RefDocNo', 30);

            $table->primary(['ISS_IM_Item_id', 'ISS_SeriesFrom', 'ISS_SeriesTo', 'ISS_Location', 'ISS_SubLocation']);
            $table->index('ISS_AssetID');
        });

        Schema::create('tblINV_ItemSeriesDispensed', function (Blueprint $table) {
            $table->bigIncrements('ISD_EntryNo');
            $table->string('ISD_IM_Item_id');
            $table->bigInteger('ISD_SeriesFrom');
            $table->bigInteger('ISD_SeriesTo');
            $table->string('ISD_Location, 30');
            $table->string('ISD_SubLocation', 30);
            $table->string('ISD_AssetID', 30)->nullable();
            $table->string('ISD_RefDocNo', 30);

            $table->index('ISD_SeriesFrom');
            $table->index('ISD_SeriesTo');
            $table->index('ISD_RefDocNo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('tblINV_ItemSeriesStock');
        Schema::drop('tblINV_ItemSeriesDispensed');
    }

}
