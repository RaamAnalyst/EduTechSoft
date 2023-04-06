<?php

namespace App\Http\Requests;

use App\Models\Assignment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAssignmentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('assignment_edit'),
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
            'course_title_id' => [
                'integer',
                'exists:courses,id',
                'nullable',
            ],
            'assignment_title' => [
                'string',
                'nullable',
            ],
            'assignment_description' => [
                'string',
                'nullable',
            ],
            'assignment.assignment_due_date' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
        ];
    }
}
