<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuthorDetailRequest;
use App\Http\Requests\UpdateAuthorDetailRequest;
use App\Http\Resources\Admin\AuthorDetailResource;
use App\Models\AuthorDetail;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorDetailApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('author_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AuthorDetailResource(AuthorDetail::with(['owner'])->get());
    }

    public function store(StoreAuthorDetailRequest $request)
    {
        $authorDetail = AuthorDetail::create($request->validated());

        return (new AuthorDetailResource($authorDetail))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AuthorDetail $authorDetail)
    {
        abort_if(Gate::denies('author_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AuthorDetailResource($authorDetail->load(['owner']));
    }

    public function update(UpdateAuthorDetailRequest $request, AuthorDetail $authorDetail)
    {
        $authorDetail->update($request->validated());

        return (new AuthorDetailResource($authorDetail))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AuthorDetail $authorDetail)
    {
        abort_if(Gate::denies('author_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $authorDetail->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
