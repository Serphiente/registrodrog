<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToClientContactsTable extends Migration
{
    public function up()
    {
        Schema::table('client_contacts', function (Blueprint $table) {
            $table->unsignedInteger('client_id');
            $table->foreign('client_id', 'client_fk_1386894')->references('id')->on('clients');
        });

    }
}
