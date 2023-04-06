<?php

namespace App\Http\Livewire\Assignment;

use App\Models\Assignment;
use App\Models\Course;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Assignment $assignment;

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

    public function mount(Assignment $assignment)
    {
        $this->assignment = $assignment;
        $this->initListsForFields();
        $this->mediaCollections = [
            'assignment_support_files' => $assignment->support_files,
        ];
    }

    public function render()
    {
        return view('livewire.assignment.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->assignment->save();
        $this->syncMedia();

        return redirect()->route('admin.assignments.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->assignment->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'assignment.course_title_id' => [
                'integer',
                'exists:courses,id',
                'nullable',
            ],
            'assignment.assignment_title' => [
                'string',
                'nullable',
            ],
            'assignment.assignment_description' => [
                'string',
                'nullable',
            ],
            'mediaCollections.assignment_support_files' => [
                'array',
                'nullable',
            ],
            'mediaCollections.assignment_support_files.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'assignment.assignment_due_date' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['course_title'] = Course::pluck('title', 'id')->toArray();
    }
}
