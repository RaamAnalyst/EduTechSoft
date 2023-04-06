<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('assignment_title')->nullable();
            $table->longText('assignment_description')->nullable();
            $table->datetime('assignment_due_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
