<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrdenItemsTable extends Migration
{
    public function up()
    {
        Schema::create('purchase_orden_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item')->nullable();
            $table->integer('number')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

    }
}
