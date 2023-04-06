<?php

namespace App\Http\Livewire\SearchArticle;

use App\Models\AuthorDetail;
use App\Models\JournalDetail;
use App\Models\Publisher;
use App\Models\SearchArticle;
use Livewire\Component;

class Edit extends Component
{
    public array $listsForFields = [];

    public SearchArticle $searchArticle;

    public function mount(SearchArticle $searchArticle)
    {
        $this->searchArticle = $searchArticle;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.search-article.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->searchArticle->save();

        return redirect()->route('admin.search-articles.index');
    }

    protected function rules(): array
    {
        return [
            'searchArticle.authors_id' => [
                'integer',
                'exists:author_details,id',
                'nullable',
            ],
            'searchArticle.journal_title_id' => [
                'integer',
                'exists:journal_details,id',
                'nullable',
            ],
            'searchArticle.issn_type_id' => [
                'integer',
                'exists:journal_details,id',
                'nullable',
            ],
            'searchArticle.journal_issn_id' => [
                'integer',
                'exists:journal_details,id',
                'nullable',
            ],
            'searchArticle.journal_url_id' => [
                'integer',
                'exists:journal_details,id',
                'nullable',
            ],
            'searchArticle.publisher_name_id' => [
                'integer',
                'exists:publishers,id',
                'nullable',
            ],
            'searchArticle.abstract_title' => [
                'string',
                'nullable',
            ],
            'searchArticle.description' => [
                'string',
                'nullable',
            ],
            'searchArticle.link_to_journal' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['authors']        = AuthorDetail::pluck('author_name', 'id')->toArray();
        $this->listsForFields['journal_title']  = JournalDetail::pluck('journal_title', 'id')->toArray();
        $this->listsForFields['issn_type']      = JournalDetail::pluck('issn_type', 'id')->toArray();
        $this->listsForFields['journal_issn']   = JournalDetail::pluck('journal_issn', 'id')->toArray();
        $this->listsForFields['journal_url']    = JournalDetail::pluck('journal_url', 'id')->toArray();
        $this->listsForFields['publisher_name'] = Publisher::pluck('publisher_name', 'id')->toArray();
    }
}
