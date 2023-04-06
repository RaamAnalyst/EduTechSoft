<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Http\Resources\Admin\DocumentResource;
use App\Models\Document;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DocumentApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('document_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocumentResource(Document::with(['ownerName', 'reviewerName', 'owner'])->get());
    }

    public function store(StoreDocumentRequest $request)
    {
        $document = Document::create($request->validated());
        $document->reviewerName()->sync($request->input('reviewerName', []));
        foreach ($request->input('document_document_upload', []) as $file) {
            $document->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('document_document_upload');
        }

        return (new DocumentResource($document))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Document $document)
    {
        abort_if(Gate::denies('document_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocumentResource($document->load(['ownerName', 'reviewerName', 'owner']));
    }

    public function update(UpdateDocumentRequest $request, Document $document)
    {
        $document->update($request->validated());
        $document->reviewerName()->sync($request->input('reviewerName', []));
        if (count($document->document_document_upload) > 0) {
            foreach ($document->document_document_upload as $media) {
                if (!in_array($media->file_name, $request->input('document_document_upload', []))) {
                    $media->delete();
                }
            }
        }
        $media = $document->document_document_upload->pluck('file_name')->toArray();
        foreach ($request->input('document_document_upload', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $document->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('document_document_upload');
            }
        }

        return (new DocumentResource($document))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Document $document)
    {
        abort_if(Gate::denies('document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $document->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
