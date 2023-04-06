<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDocumentReviewerRequest;
use App\Http\Requests\UpdateDocumentReviewerRequest;
use App\Http\Resources\Admin\DocumentReviewerResource;
use App\Models\DocumentReviewer;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DocumentReviewerApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('document_reviewer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocumentReviewerResource(DocumentReviewer::with(['owner'])->get());
    }

    public function store(StoreDocumentReviewerRequest $request)
    {
        $documentReviewer = DocumentReviewer::create($request->validated());

        return (new DocumentReviewerResource($documentReviewer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DocumentReviewer $documentReviewer)
    {
        abort_if(Gate::denies('document_reviewer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocumentReviewerResource($documentReviewer->load(['owner']));
    }

    public function update(UpdateDocumentReviewerRequest $request, DocumentReviewer $documentReviewer)
    {
        $documentReviewer->update($request->validated());

        return (new DocumentReviewerResource($documentReviewer))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DocumentReviewer $documentReviewer)
    {
        abort_if(Gate::denies('document_reviewer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentReviewer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
