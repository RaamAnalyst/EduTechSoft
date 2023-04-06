<?php

namespace App\Http\Requests;

use App\Models\DocumentOwner;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDocumentOwnerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('document_owner_create'),
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
            'owner_name' => [
                'string',
                'nullable',
            ],
            'owner_mail' => [
                'email:rfc',
                'nullable',
            ],
        ];
    }
}
