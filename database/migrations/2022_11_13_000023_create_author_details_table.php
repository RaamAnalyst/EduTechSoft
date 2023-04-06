<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('author_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('author_name')->nullable();
            $table->string('author_affiliation')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
