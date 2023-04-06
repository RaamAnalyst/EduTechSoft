<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('assignment_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Assignment" format="csv" />
                <livewire:excel-export model="Assignment" format="xlsx" />
                <livewire:excel-export model="Assignment" format="pdf" />
            @endif




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
                            {{ trans('cruds.assignment.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.assignment.fields.course_title') }}
                            @include('components.table.sort', ['field' => 'course_title.title'])
                        </th>
                        <th>
                            {{ trans('cruds.assignment.fields.assignment_title') }}
                            @include('components.table.sort', ['field' => 'assignment_title'])
                        </th>
                        <th>
                            {{ trans('cruds.assignment.fields.assignment_description') }}
                            @include('components.table.sort', ['field' => 'assignment_description'])
                        </th>
                        <th>
                            {{ trans('cruds.assignment.fields.support_files') }}
                        </th>
                        <th>
                            {{ trans('cruds.assignment.fields.assignment_due_date') }}
                            @include('components.table.sort', ['field' => 'assignment_due_date'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($assignments as $assignment)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $assignment->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $assignment->id }}
                            </td>
                            <td>
                                @if($assignment->courseTitle)
                                    <span class="badge badge-relationship">{{ $assignment->courseTitle->title ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $assignment->assignment_title }}
                            </td>
                            <td>
                                {{ $assignment->assignment_description }}
                            </td>
                            <td>
                                @foreach($assignment->support_files as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $assignment->assignment_due_date }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('assignment_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.assignments.show', $assignment) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('assignment_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.assignments.edit', $assignment) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('assignment_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $assignment->id }})" wire:loading.attr="disabled">
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
            {{ $assignments->links() }}
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