<?php

namespace App\Http\Livewire\Publisher;

use App\Models\Publisher;
use Livewire\Component;

class Create extends Component
{
    public Publisher $publisher;

    public function mount(Publisher $publisher)
    {
        $this->publisher = $publisher;
    }

    public function render()
    {
        return view('livewire.publisher.create');
    }

    public function submit()
    {
        $this->validate();

        $this->publisher->save();

        return redirect()->route('admin.publishers.index');
    }

    protected function rules(): array
    {
        return [
            'publisher.publisher_name' => [
                'string',
                'nullable',
            ],
            'publisher.publisher_language' => [
                'string',
                'nullable',
            ],
            'publisher.publisher_title' => [
                'string',
                'nullable',
            ],
        ];
    }
}
