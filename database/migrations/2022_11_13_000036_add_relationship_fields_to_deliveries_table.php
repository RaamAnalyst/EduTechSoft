<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDeliveriesTable extends Migration
{
    public function up()
    {
        Schema::table('deliveries', function (Blueprint $table) {
            $table->unsignedBigInteger('order_title_id')->nullable();
            $table->foreign('order_title_id', 'order_title_fk_7473031')->references('id')->on('orders');
            $table->unsignedBigInteger('delivery_due_id')->nullable();
            $table->foreign('delivery_due_id', 'delivery_due_fk_7473037')->references('id')->on('orders');
            $table->unsignedBigInteger('user_name_id')->nullable();
            $table->foreign('user_name_id', 'user_name_fk_7473032')->references('id')->on('users');
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id', 'owner_fk_7473036')->references('id')->on('users');
        });
    }
}
