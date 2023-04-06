<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreBrowseAssignmentRequest;
use App\Http\Requests\UpdateBrowseAssignmentRequest;
use App\Http\Resources\Admin\BrowseAssignmentResource;
use App\Models\BrowseAssignment;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BrowseAssignmentApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('browse_assignment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BrowseAssignmentResource(BrowseAssignment::with(['categories', 'tags', 'owner'])->get());
    }

    public function store(StoreBrowseAssignmentRequest $request)
    {
        $browseAssignment = BrowseAssignment::create($request->validated());

        if ($request->input('browse_assignment_attachments', false)) {
            $browseAssignment->addMedia(storage_path('tmp/uploads/' . basename($request->input('browse_assignment_attachments'))))->toMediaCollection('browse_assignment_attachments');
        }

        return (new BrowseAssignmentResource($browseAssignment))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(BrowseAssignment $browseAssignment)
    {
        abort_if(Gate::denies('browse_assignment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BrowseAssignmentResource($browseAssignment->load(['categories', 'tags', 'owner']));
    }

    public function update(UpdateBrowseAssignmentRequest $request, BrowseAssignment $browseAssignment)
    {
        $browseAssignment->update($request->validated());

        if ($request->input('browse_assignment_attachments', false)) {
            if (!$browseAssignment->browse_assignment_attachments || $request->input('browse_assignment_attachments') !== $browseAssignment->browse_assignment_attachments->file_name) {
                if ($browseAssignment->browse_assignment_attachments) {
                    $browseAssignment->browse_assignment_attachments->delete();
                }
                $browseAssignment->addMedia(storage_path('tmp/uploads/' . basename($request->input('browse_assignment_attachments'))))->toMediaCollection('browse_assignment_attachments');
            }
        } elseif ($browseAssignment->browse_assignment_attachments) {
            $browseAssignment->browse_assignment_attachments->delete();
        }

        return (new BrowseAssignmentResource($browseAssignment))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(BrowseAssignment $browseAssignment)
    {
        abort_if(Gate::denies('browse_assignment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $browseAssignment->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
