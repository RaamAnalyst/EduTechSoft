<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->unique();
            $table->longText('description')->nullable();
            $table->longText('instructions')->nullable();
            $table->datetime('due_date')->nullable();
            $table->boolean('terms')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
