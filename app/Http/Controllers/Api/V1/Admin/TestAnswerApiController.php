<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestAnswerRequest;
use App\Http\Requests\UpdateTestAnswerRequest;
use App\Http\Resources\Admin\TestAnswerResource;
use App\Models\TestAnswer;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TestAnswerApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('test_answer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TestAnswerResource(TestAnswer::with(['testResult', 'question', 'option'])->get());
    }

    public function store(StoreTestAnswerRequest $request)
    {
        $testAnswer = TestAnswer::create($request->validated());

        return (new TestAnswerResource($testAnswer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TestAnswer $testAnswer)
    {
        abort_if(Gate::denies('test_answer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TestAnswerResource($testAnswer->load(['testResult', 'question', 'option']));
    }

    public function update(UpdateTestAnswerRequest $request, TestAnswer $testAnswer)
    {
        $testAnswer->update($request->validated());

        return (new TestAnswerResource($testAnswer))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TestAnswer $testAnswer)
    {
        abort_if(Gate::denies('test_answer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testAnswer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
