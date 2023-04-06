<?php

namespace App\Http\Livewire\Service;

use App\Models\Service;
use Livewire\Component;

class Edit extends Component
{
    public Service $service;

    public function mount(Service $service)
    {
        $this->service = $service;
    }

    public function render()
    {
        return view('livewire.service.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->service->save();

        return redirect()->route('admin.services.index');
    }

    protected function rules(): array
    {
        return [
            'service.service_type' => [
                'string',
                'nullable',
            ],
        ];
    }
}
