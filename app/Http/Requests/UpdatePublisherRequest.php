<?php

namespace App\Http\Requests;

use App\Models\Publisher;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePublisherRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('publisher_edit'),
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
            'publisher_name' => [
                'string',
                'nullable',
            ],
            'publisher_language' => [
                'string',
                'nullable',
            ],
            'publisher_title' => [
                'string',
                'nullable',
            ],
        ];
    }
}
