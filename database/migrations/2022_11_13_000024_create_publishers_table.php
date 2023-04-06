<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublishersTable extends Migration
{
    public function up()
    {
        Schema::create('publishers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('publisher_name')->nullable();
            $table->string('publisher_language')->nullable();
            $table->string('publisher_title')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
