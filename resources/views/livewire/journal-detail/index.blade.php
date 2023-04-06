<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('journal_detail_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="JournalDetail" format="csv" />
                <livewire:excel-export model="JournalDetail" format="xlsx" />
                <livewire:excel-export model="JournalDetail" format="pdf" />
            @endif


            @can('journal_detail_create')
                <x-csv-import route="{{ route('admin.journal-details.csv.store') }}" />
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
                            {{ trans('cruds.journalDetail.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.journalDetail.fields.journal_title') }}
                            @include('components.table.sort', ['field' => 'journal_title'])
                        </th>
                        <th>
                            {{ trans('cruds.journalDetail.fields.journal_issn') }}
                            @include('components.table.sort', ['field' => 'journal_issn'])
                        </th>
                        <th>
                            {{ trans('cruds.journalDetail.fields.issn_type') }}
                            @include('components.table.sort', ['field' => 'issn_type'])
                        </th>
                        <th>
                            {{ trans('cruds.journalDetail.fields.journal_url') }}
                            @include('components.table.sort', ['field' => 'journal_url'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($journalDetails as $journalDetail)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $journalDetail->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $journalDetail->id }}
                            </td>
                            <td>
                                {{ $journalDetail->journal_title }}
                            </td>
                            <td>
                                {{ $journalDetail->journal_issn }}
                            </td>
                            <td>
                                {{ $journalDetail->issn_type }}
                            </td>
                            <td>
                                {{ $journalDetail->journal_url }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('journal_detail_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.journal-details.show', $journalDetail) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('journal_detail_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.journal-details.edit', $journalDetail) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('journal_detail_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $journalDetail->id }})" wire:loading.attr="disabled">
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
            {{ $journalDetails->links() }}
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