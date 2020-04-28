<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToIngresosTable extends Migration
{
    public function up()
    {
        Schema::table('ingresos', function (Blueprint $table) {
            $table->unsignedInteger('supplier_id');
            $table->foreign('supplier_id', 'supplier_fk_1273617')->references('id')->on('suppliers');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id', 'product_fk_1273619')->references('id')->on('baseproducts');
        });

    }
}
