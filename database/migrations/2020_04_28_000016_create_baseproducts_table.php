<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseproductsTable extends Migration
{
    public function up()
    {
        Schema::create('baseproducts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('medida')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

    }
}
