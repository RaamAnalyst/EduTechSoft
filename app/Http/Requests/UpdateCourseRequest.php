<?php

namespace App\Http\Requests;

use App\Models\Course;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCourseRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('course_edit'),
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
            'teacher_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
            'title' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'required',
            ],
            'price' => [
                'numeric',
                'nullable',
            ],
            'is_published' => [
                'boolean',
            ],
            'students' => [
                'array',
            ],
            'students.*.id' => [
                'integer',
                'exists:users,id',
            ],
        ];
    }
}
