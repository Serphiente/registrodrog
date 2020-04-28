<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rut')->unique();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('web')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

    }
}
