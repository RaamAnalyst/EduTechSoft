<?php

namespace App\Http\Requests;

use App\Models\QuestionOption;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateQuestionOptionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('question_option_edit'),
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
            'question_id' => [
                'integer',
                'exists:questions,id',
                'nullable',
            ],
            'option_text' => [
                'string',
                'required',
            ],
            'is_correct' => [
                'boolean',
            ],
        ];
    }
}
