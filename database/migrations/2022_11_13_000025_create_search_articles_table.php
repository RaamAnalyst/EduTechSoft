<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSearchArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('search_articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('abstract_title')->nullable();
            $table->longText('description')->nullable();
            $table->longText('link_to_journal')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
