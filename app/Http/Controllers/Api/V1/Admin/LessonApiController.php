<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Http\Resources\Admin\LessonResource;
use App\Models\Lesson;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LessonApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('lesson_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LessonResource(Lesson::with(['course'])->get());
    }

    public function store(StoreLessonRequest $request)
    {
        $lesson = Lesson::create($request->validated());

        foreach ($request->input('lesson_thumbnail', []) as $file) {
            $lesson->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('lesson_thumbnail');
        }

        if ($request->input('lesson_video', false)) {
            $lesson->addMedia(storage_path('tmp/uploads/' . basename($request->input('lesson_video'))))->toMediaCollection('lesson_video');
        }

        return (new LessonResource($lesson))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Lesson $lesson)
    {
        abort_if(Gate::denies('lesson_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LessonResource($lesson->load(['course']));
    }

    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        $lesson->update($request->validated());

        if (count($lesson->lesson_thumbnail) > 0) {
            foreach ($lesson->lesson_thumbnail as $media) {
                if (!in_array($media->file_name, $request->input('lesson_thumbnail', []))) {
                    $media->delete();
                }
            }
        }
        $media = $lesson->lesson_thumbnail->pluck('file_name')->toArray();
        foreach ($request->input('lesson_thumbnail', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $lesson->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('lesson_thumbnail');
            }
        }

        if ($request->input('lesson_video', false)) {
            if (!$lesson->lesson_video || $request->input('lesson_video') !== $lesson->lesson_video->file_name) {
                if ($lesson->lesson_video) {
                    $lesson->lesson_video->delete();
                }
                $lesson->addMedia(storage_path('tmp/uploads/' . basename($request->input('lesson_video'))))->toMediaCollection('lesson_video');
            }
        } elseif ($lesson->lesson_video) {
            $lesson->lesson_video->delete();
        }

        return (new LessonResource($lesson))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Lesson $lesson)
    {
        abort_if(Gate::denies('lesson_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lesson->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
