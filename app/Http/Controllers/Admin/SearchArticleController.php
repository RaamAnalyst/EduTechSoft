<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\SearchArticle;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SearchArticleController extends Controller
{
    use WithCSVImport;

    public function __construct()
    {
        $this->csvImportModel = SearchArticle::class;
    }

    public function index()
    {
        abort_if(Gate::denies('search_article_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.search-article.index');
    }

    public function create()
    {
        abort_if(Gate::denies('search_article_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.search-article.create');
    }

    public function edit(SearchArticle $searchArticle)
    {
        abort_if(Gate::denies('search_article_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.search-article.edit', compact('searchArticle'));
    }

    public function show(SearchArticle $searchArticle)
    {
        abort_if(Gate::denies('search_article_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $searchArticle->load('authors', 'journalTitle', 'issnType', 'journalIssn', 'journalUrl', 'publisherName', 'owner');

        return view('admin.search-article.show', compact('searchArticle'));
    }
}
