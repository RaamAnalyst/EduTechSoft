<?php

namespace App\Http\Requests;

use App\Models\Lesson;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLessonRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('lesson_create'),
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
            'course_id' => [
                'integer',
                'exists:courses,id',
                'required',
            ],
            'title' => [
                'string',
                'required',
            ],
            'short_text' => [
                'string',
                'nullable',
            ],
            'long_text' => [
                'string',
                'nullable',
            ],
            'position' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'is_published' => [
                'boolean',
            ],
            'is_free' => [
                'boolean',
            ],
        ];
    }
}
