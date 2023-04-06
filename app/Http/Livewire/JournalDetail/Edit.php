<?php

namespace App\Http\Livewire\JournalDetail;

use App\Models\JournalDetail;
use Livewire\Component;

class Edit extends Component
{
    public JournalDetail $journalDetail;

    public function mount(JournalDetail $journalDetail)
    {
        $this->journalDetail = $journalDetail;
    }

    public function render()
    {
        return view('livewire.journal-detail.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->journalDetail->save();

        return redirect()->route('admin.journal-details.index');
    }

    protected function rules(): array
    {
        return [
            'journalDetail.journal_title' => [
                'string',
                'nullable',
            ],
            'journalDetail.journal_issn' => [
                'string',
                'nullable',
            ],
            'journalDetail.issn_type' => [
                'string',
                'nullable',
            ],
            'journalDetail.journal_url' => [
                'string',
                'nullable',
            ],
        ];
    }
}
