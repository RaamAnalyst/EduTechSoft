<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use App\Http\Resources\Admin\PublisherResource;
use App\Models\Publisher;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PublisherApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('publisher_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PublisherResource(Publisher::with(['owner'])->get());
    }

    public function store(StorePublisherRequest $request)
    {
        $publisher = Publisher::create($request->validated());

        return (new PublisherResource($publisher))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Publisher $publisher)
    {
        abort_if(Gate::denies('publisher_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PublisherResource($publisher->load(['owner']));
    }

    public function update(UpdatePublisherRequest $request, Publisher $publisher)
    {
        $publisher->update($request->validated());

        return (new PublisherResource($publisher))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Publisher $publisher)
    {
        abort_if(Gate::denies('publisher_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $publisher->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
