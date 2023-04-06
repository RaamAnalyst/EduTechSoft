<?php

namespace App\Http\Requests;

use App\Models\AuthorDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAuthorDetailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('author_detail_create'),
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
            'author_name' => [
                'string',
                'nullable',
            ],
            'author_affiliation' => [
                'string',
                'nullable',
            ],
        ];
    }
}
