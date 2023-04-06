<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAssignmentsTable extends Migration
{
    public function up()
    {
        Schema::table('assignments', function (Blueprint $table) {
            $table->unsignedBigInteger('course_title_id')->nullable();
            $table->foreign('course_title_id', 'course_title_fk_7477487')->references('id')->on('courses');
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id', 'owner_fk_7477495')->references('id')->on('users');
        });
    }
}
