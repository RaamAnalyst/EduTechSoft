<?php

namespace App\Http\Livewire\BrowseAssignment;

use App\Models\BrowseAssignment;
use App\Models\Category;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public BrowseAssignment $browseAssignment;

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

    public function mount(BrowseAssignment $browseAssignment)
    {
        $this->browseAssignment = $browseAssignment;
        $this->initListsForFields();
        $this->mediaCollections = [
            'browse_assignment_attachments' => $browseAssignment->attachments,
        ];
    }

    public function render()
    {
        return view('livewire.browse-assignment.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->browseAssignment->save();
        $this->syncMedia();

        return redirect()->route('admin.browse-assignments.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->browseAssignment->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'browseAssignment.title' => [
                'string',
                'nullable',
            ],
            'browseAssignment.question' => [
                'string',
                'nullable',
            ],
            'browseAssignment.solution' => [
                'string',
                'nullable',
            ],
            'browseAssignment.categories_id' => [
                'integer',
                'exists:categories,id',
                'nullable',
            ],
            'browseAssignment.tags_id' => [
                'integer',
                'exists:categories,id',
                'nullable',
            ],
            'mediaCollections.browse_assignment_attachments' => [
                'array',
                'nullable',
            ],
            'mediaCollections.browse_assignment_attachments.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['categories'] = Category::pluck('categories', 'id')->toArray();
        $this->listsForFields['tags']       = Category::pluck('tags', 'id')->toArray();
    }
}
