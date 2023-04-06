<?php

namespace App\Http\Livewire\AuthorDetail;

use App\Models\AuthorDetail;
use Livewire\Component;

class Edit extends Component
{
    public AuthorDetail $authorDetail;

    public function mount(AuthorDetail $authorDetail)
    {
        $this->authorDetail = $authorDetail;
    }

    public function render()
    {
        return view('livewire.author-detail.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->authorDetail->save();

        return redirect()->route('admin.author-details.index');
    }

    protected function rules(): array
    {
        return [
            'authorDetail.author_name' => [
                'string',
                'nullable',
            ],
            'authorDetail.author_affiliation' => [
                'string',
                'nullable',
            ],
        ];
    }
}
