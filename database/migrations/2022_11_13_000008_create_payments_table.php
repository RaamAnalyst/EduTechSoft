<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('cost_to_pay', 15, 2)->nullable();
            $table->integer('discount')->nullable();
            $table->decimal('final_pay', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
