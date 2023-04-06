<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBrowseAssignmentsTable extends Migration
{
    public function up()
    {
        Schema::table('browse_assignments', function (Blueprint $table) {
            $table->unsignedBigInteger('categories_id')->nullable();
            $table->foreign('categories_id', 'categories_fk_7615015')->references('id')->on('categories');
            $table->unsignedBigInteger('tags_id')->nullable();
            $table->foreign('tags_id', 'tags_fk_7615016')->references('id')->on('categories');
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id', 'owner_fk_7615021')->references('id')->on('users');
        });
    }
}
