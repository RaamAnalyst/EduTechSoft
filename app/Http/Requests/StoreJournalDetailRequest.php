<?php

namespace App\Http\Requests;

use App\Models\JournalDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreJournalDetailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('journal_detail_create'),
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
            'journal_title' => [
                'string',
                'nullable',
            ],
            'journal_issn' => [
                'string',
                'nullable',
            ],
            'issn_type' => [
                'string',
                'nullable',
            ],
            'journal_url' => [
                'string',
                'nullable',
            ],
        ];
    }
}
