<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBaseproductsTable extends Migration
{
    public function up()
    {
        Schema::table('baseproducts', function (Blueprint $table) {
            $table->unsignedInteger('laboratory_id')->nullable();
            $table->foreign('laboratory_id', 'laboratory_fk_1272689')->references('id')->on('laboratories');
        });

    }
}
