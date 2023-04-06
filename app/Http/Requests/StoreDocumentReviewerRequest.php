<?php

namespace App\Http\Requests;

use App\Models\DocumentReviewer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDocumentReviewerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('document_reviewer_create'),
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
            'reviewer_name' => [
                'string',
                'nullable',
            ],
            'reviewer_email' => [
                'email:rfc',
                'nullable',
            ],
        ];
    }
}
