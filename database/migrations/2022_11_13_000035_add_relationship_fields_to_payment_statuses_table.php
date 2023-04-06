<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPaymentStatusesTable extends Migration
{
    public function up()
    {
        Schema::table('payment_statuses', function (Blueprint $table) {
            $table->unsignedBigInteger('order_title_id')->nullable();
            $table->foreign('order_title_id', 'order_title_fk_7473017')->references('id')->on('orders');
            $table->unsignedBigInteger('payment_cost_id')->nullable();
            $table->foreign('payment_cost_id', 'payment_cost_fk_7473018')->references('id')->on('payments');
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id', 'owner_fk_7473024')->references('id')->on('users');
        });
    }
}
