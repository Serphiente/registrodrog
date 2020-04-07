<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmaceuticalFormsTable extends Migration
{
    public function up()
    {
        Schema::create('pharmaceutical_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('long_name');
            $table->string('short_name');
            $table->timestamps();
            $table->softDeletes();
        });

    }
}
