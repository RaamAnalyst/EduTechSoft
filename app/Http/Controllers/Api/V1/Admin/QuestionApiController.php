<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Http\Resources\Admin\QuestionResource;
use App\Models\Question;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('question_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QuestionResource(Question::with(['course'])->get());
    }

    public function store(StoreQuestionRequest $request)
    {
        $question = Question::create($request->validated());

        if ($request->input('question_question_image', false)) {
            $question->addMedia(storage_path('tmp/uploads/' . basename($request->input('question_question_image'))))->toMediaCollection('question_question_image');
        }

        return (new QuestionResource($question))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Question $question)
    {
        abort_if(Gate::denies('question_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QuestionResource($question->load(['course']));
    }

    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $question->update($request->validated());

        if ($request->input('question_question_image', false)) {
            if (!$question->question_question_image || $request->input('question_question_image') !== $question->question_question_image->file_name) {
                if ($question->question_question_image) {
                    $question->question_question_image->delete();
                }
                $question->addMedia(storage_path('tmp/uploads/' . basename($request->input('question_question_image'))))->toMediaCollection('question_question_image');
            }
        } elseif ($question->question_question_image) {
            $question->question_question_image->delete();
        }

        return (new QuestionResource($question))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Question $question)
    {
        abort_if(Gate::denies('question_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $question->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
