<?php

namespace App\Http\Requests;

use App\Models\TestAnswer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTestAnswerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('test_answer_create'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'test_result_id' => [
                'integer',
                'exists:test_results,id',
                'required',
            ],
            'question_id' => [
                'integer',
                'exists:questions,id',
                'required',
            ],
            'option_id' => [
                'integer',
                'exists:question_options,id',
                'required',
            ],
            'is_correct' => [
                'boolean',
            ],
        ];
    }
}
