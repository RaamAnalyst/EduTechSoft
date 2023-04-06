<?php

namespace App\Http\Requests;

use App\Models\Document;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDocumentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('document_edit'),
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
            'document_name' => [
                'string',
                'nullable',
            ],
            'document_description' => [
                'string',
                'nullable',
            ],
            'owner_name_id' => [
                'integer',
                'exists:document_owners,id',
                'nullable',
            ],
            'reviewer_name' => [
                'array',
            ],
            'reviewer_name.*.id' => [
                'integer',
                'exists:document_reviewers,id',
            ],
        ];
    }
}
