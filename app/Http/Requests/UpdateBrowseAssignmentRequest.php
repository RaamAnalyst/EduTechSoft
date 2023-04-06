<?php

namespace App\Http\Requests;

use App\Models\BrowseAssignment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBrowseAssignmentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('browse_assignment_edit'),
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
            'title' => [
                'string',
                'nullable',
            ],
            'question' => [
                'string',
                'nullable',
            ],
            'solution' => [
                'string',
                'nullable',
            ],
            'categories_id' => [
                'integer',
                'exists:categories,id',
                'nullable',
            ],
            'tags_id' => [
                'integer',
                'exists:categories,id',
                'nullable',
            ],
        ];
    }
}
