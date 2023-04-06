<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSearchArticlesTable extends Migration
{
    public function up()
    {
        Schema::table('search_articles', function (Blueprint $table) {
            $table->unsignedBigInteger('authors_id')->nullable();
            $table->foreign('authors_id', 'authors_fk_7615256')->references('id')->on('author_details');
            $table->unsignedBigInteger('journal_title_id')->nullable();
            $table->foreign('journal_title_id', 'journal_title_fk_7615257')->references('id')->on('journal_details');
            $table->unsignedBigInteger('issn_type_id')->nullable();
            $table->foreign('issn_type_id', 'issn_type_fk_7615258')->references('id')->on('journal_details');
            $table->unsignedBigInteger('journal_issn_id')->nullable();
            $table->foreign('journal_issn_id', 'journal_issn_fk_7615259')->references('id')->on('journal_details');
            $table->unsignedBigInteger('journal_url_id')->nullable();
            $table->foreign('journal_url_id', 'journal_url_fk_7615260')->references('id')->on('journal_details');
            $table->unsignedBigInteger('publisher_name_id')->nullable();
            $table->foreign('publisher_name_id', 'publisher_name_fk_7615261')->references('id')->on('publishers');
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id', 'owner_fk_7615268')->references('id')->on('users');
        });
    }
}
