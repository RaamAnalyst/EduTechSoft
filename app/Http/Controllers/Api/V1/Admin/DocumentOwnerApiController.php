<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDocumentOwnerRequest;
use App\Http\Requests\UpdateDocumentOwnerRequest;
use App\Http\Resources\Admin\DocumentOwnerResource;
use App\Models\DocumentOwner;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DocumentOwnerApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('document_owner_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocumentOwnerResource(DocumentOwner::with(['owner'])->get());
    }

    public function store(StoreDocumentOwnerRequest $request)
    {
        $documentOwner = DocumentOwner::create($request->validated());

        return (new DocumentOwnerResource($documentOwner))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DocumentOwner $documentOwner)
    {
        abort_if(Gate::denies('document_owner_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocumentOwnerResource($documentOwner->load(['owner']));
    }

    public function update(UpdateDocumentOwnerRequest $request, DocumentOwner $documentOwner)
    {
        $documentOwner->update($request->validated());

        return (new DocumentOwnerResource($documentOwner))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DocumentOwner $documentOwner)
    {
        abort_if(Gate::denies('document_owner_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentOwner->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
