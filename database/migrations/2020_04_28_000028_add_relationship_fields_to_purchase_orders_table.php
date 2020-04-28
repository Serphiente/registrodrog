<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPurchaseOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('purchase_orders', function (Blueprint $table) {
            $table->unsignedInteger('client_id');
            $table->foreign('client_id', 'client_fk_1386981')->references('id')->on('clients');
            $table->unsignedInteger('client_contact_id')->nullable();
            $table->foreign('client_contact_id', 'client_contact_fk_1386982')->references('id')->on('client_contacts');
        });

    }
}
