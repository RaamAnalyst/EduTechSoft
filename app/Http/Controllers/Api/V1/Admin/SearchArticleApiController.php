<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSearchArticleRequest;
use App\Http\Requests\UpdateSearchArticleRequest;
use App\Http\Resources\Admin\SearchArticleResource;
use App\Models\SearchArticle;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SearchArticleApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('search_article_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SearchArticleResource(SearchArticle::with(['authors', 'journalTitle', 'issnType', 'journalIssn', 'journalUrl', 'publisherName', 'owner'])->get());
    }

    public function store(StoreSearchArticleRequest $request)
    {
        $searchArticle = SearchArticle::create($request->validated());

        return (new SearchArticleResource($searchArticle))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SearchArticle $searchArticle)
    {
        abort_if(Gate::denies('search_article_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SearchArticleResource($searchArticle->load(['authors', 'journalTitle', 'issnType', 'journalIssn', 'journalUrl', 'publisherName', 'owner']));
    }

    public function update(UpdateSearchArticleRequest $request, SearchArticle $searchArticle)
    {
        $searchArticle->update($request->validated());

        return (new SearchArticleResource($searchArticle))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SearchArticle $searchArticle)
    {
        abort_if(Gate::denies('search_article_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $searchArticle->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
