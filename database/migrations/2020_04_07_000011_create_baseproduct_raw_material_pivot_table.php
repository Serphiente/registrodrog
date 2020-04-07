<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseproductRawMaterialPivotTable extends Migration
{
    public function up()
    {
        Schema::create('baseproduct_raw_material', function (Blueprint $table) {
            $table->unsignedInteger('baseproduct_id');
            $table->foreign('baseproduct_id', 'baseproduct_id_fk_1272688')->references('id')->on('baseproducts')->onDelete('cascade');
            $table->unsignedInteger('raw_material_id');
            $table->foreign('raw_material_id', 'raw_material_id_fk_1272688')->references('id')->on('raw_materials')->onDelete('cascade');
        });

    }
}
