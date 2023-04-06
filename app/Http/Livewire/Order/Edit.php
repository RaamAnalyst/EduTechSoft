<?php

namespace App\Http\Livewire\Order;

use App\Models\Order;
use App\Models\Service;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Order $order;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    public function mount(Order $order)
    {
        $this->order = $order;
        $this->initListsForFields();
        $this->mediaCollections = [
            'order_file_upload' => $order->file_upload,
        ];
    }

    public function render()
    {
        return view('livewire.order.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->order->save();
        $this->syncMedia();

        return redirect()->route('admin.orders.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->order->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'order.service_type_id' => [
                'integer',
                'exists:services,id',
                'nullable',
            ],
            'order.title' => [
                'string',
                'required',
                'unique:orders,title,' . $this->order->id,
            ],
            'order.description' => [
                'string',
                'nullable',
            ],
            'order.instructions' => [
                'string',
                'nullable',
            ],
            'order.due_date' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'mediaCollections.order_file_upload' => [
                'array',
                'nullable',
            ],
            'mediaCollections.order_file_upload.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'order.terms' => [
                'boolean',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['service_type'] = Service::pluck('service_type', 'id')->toArray();
    }
}
