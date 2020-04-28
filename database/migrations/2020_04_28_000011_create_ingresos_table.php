<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresosTable extends Migration
{
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bill')->nullable();
            $table->decimal('unit_price', 15, 2)->nullable();
            $table->string('lote')->nullable();
            $table->string('expiration_day')->nullable();
            $table->integer('unit_per_box')->nullable();
            $table->string('quantity')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

    }
}
