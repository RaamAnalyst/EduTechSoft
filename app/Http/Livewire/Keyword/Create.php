<?php

namespace App\Http\Livewire\Keyword;

use App\Models\Keyword;
use Livewire\Component;

class Create extends Component
{
    public Keyword $keyword;

    public function mount(Keyword $keyword)
    {
        $this->keyword = $keyword;
    }

    public function render()
    {
        return view('livewire.keyword.create');
    }

    public function submit()
    {
        $this->validate();

        $this->keyword->save();

        return redirect()->route('admin.keywords.index');
    }

    protected function rules(): array
    {
        return [
            'keyword.keywords' => [
                'string',
                'nullable',
            ],
        ];
    }
}
