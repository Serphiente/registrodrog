<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPurchaseOrdenItemsTable extends Migration
{
    public function up()
    {
        Schema::table('purchase_orden_items', function (Blueprint $table) {
            $table->unsignedInteger('purchase_order_id')->nullable();
            $table->foreign('purchase_order_id', 'purchase_order_fk_1387194')->references('id')->on('purchase_orders');
        });

    }
}
