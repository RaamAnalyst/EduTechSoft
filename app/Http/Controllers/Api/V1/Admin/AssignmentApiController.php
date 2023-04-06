<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreAssignmentRequest;
use App\Http\Requests\UpdateAssignmentRequest;
use App\Http\Resources\Admin\AssignmentResource;
use App\Models\Assignment;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AssignmentApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('assignment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AssignmentResource(Assignment::with(['courseTitle', 'owner'])->get());
    }

    public function store(StoreAssignmentRequest $request)
    {
        $assignment = Assignment::create($request->validated());

        foreach ($request->input('assignment_support_files', []) as $file) {
            $assignment->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('assignment_support_files');
        }

        return (new AssignmentResource($assignment))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Assignment $assignment)
    {
        abort_if(Gate::denies('assignment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AssignmentResource($assignment->load(['courseTitle', 'owner']));
    }

    public function update(UpdateAssignmentRequest $request, Assignment $assignment)
    {
        $assignment->update($request->validated());

        if (count($assignment->assignment_support_files) > 0) {
            foreach ($assignment->assignment_support_files as $media) {
                if (!in_array($media->file_name, $request->input('assignment_support_files', []))) {
                    $media->delete();
                }
            }
        }
        $media = $assignment->assignment_support_files->pluck('file_name')->toArray();
        foreach ($request->input('assignment_support_files', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $assignment->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('assignment_support_files');
            }
        }

        return (new AssignmentResource($assignment))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Assignment $assignment)
    {
        abort_if(Gate::denies('assignment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assignment->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
