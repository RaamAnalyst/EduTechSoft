<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('browse_assignment_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="BrowseAssignment" format="csv" />
                <livewire:excel-export model="BrowseAssignment" format="xlsx" />
                <livewire:excel-export model="BrowseAssignment" format="pdf" />
            @endif


            @can('browse_assignment_create')
                <x-csv-import route="{{ route('admin.browse-assignments.csv.store') }}" />
            @endcan

        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.browseAssignment.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.browseAssignment.fields.title') }}
                            @include('components.table.sort', ['field' => 'title'])
                        </th>
                        <th>
                            {{ trans('cruds.browseAssignment.fields.question') }}
                            @include('components.table.sort', ['field' => 'question'])
                        </th>
                        <th>
                            {{ trans('cruds.browseAssignment.fields.solution') }}
                            @include('components.table.sort', ['field' => 'solution'])
                        </th>
                        <th>
                            {{ trans('cruds.browseAssignment.fields.categories') }}
                            @include('components.table.sort', ['field' => 'categories.categories'])
                        </th>
                        <th>
                            {{ trans('cruds.browseAssignment.fields.tags') }}
                            @include('components.table.sort', ['field' => 'tags.tags'])
                        </th>
                        <th>
                            {{ trans('cruds.browseAssignment.fields.attachments') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($browseAssignments as $browseAssignment)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $browseAssignment->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $browseAssignment->id }}
                            </td>
                            <td>
                                {{ $browseAssignment->title }}
                            </td>
                            <td>
                                {{ $browseAssignment->question }}
                            </td>
                            <td>
                                {{ $browseAssignment->solution }}
                            </td>
                            <td>
                                @if($browseAssignment->categories)
                                    <span class="badge badge-relationship">{{ $browseAssignment->categories->categories ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($browseAssignment->tags)
                                    <span class="badge badge-relationship">{{ $browseAssignment->tags->tags ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @foreach($browseAssignment->attachments as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('browse_assignment_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.browse-assignments.show', $browseAssignment) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('browse_assignment_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.browse-assignments.edit', $browseAssignment) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('browse_assignment_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $browseAssignment->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $browseAssignments->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush