<?php

namespace App\Http\Requests;

use App\Models\SearchArticle;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSearchArticleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('search_article_edit'),
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
            'authors_id' => [
                'integer',
                'exists:author_details,id',
                'nullable',
            ],
            'journal_title_id' => [
                'integer',
                'exists:journal_details,id',
                'nullable',
            ],
            'issn_type_id' => [
                'integer',
                'exists:journal_details,id',
                'nullable',
            ],
            'journal_issn_id' => [
                'integer',
                'exists:journal_details,id',
                'nullable',
            ],
            'journal_url_id' => [
                'integer',
                'exists:journal_details,id',
                'nullable',
            ],
            'publisher_name_id' => [
                'integer',
                'exists:publishers,id',
                'nullable',
            ],
            'abstract_title' => [
                'string',
                'nullable',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'link_to_journal' => [
                'string',
                'nullable',
            ],
        ];
    }
}
