<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrowseAssignmentsTable extends Migration
{
    public function up()
    {
        Schema::create('browse_assignments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->longText('question')->nullable();
            $table->longText('solution')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
