<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('journal_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('journal_title')->nullable();
            $table->string('journal_issn')->nullable();
            $table->string('issn_type')->nullable();
            $table->longText('journal_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
