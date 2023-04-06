<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('search_article_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="SearchArticle" format="csv" />
                <livewire:excel-export model="SearchArticle" format="xlsx" />
                <livewire:excel-export model="SearchArticle" format="pdf" />
            @endif


            @can('search_article_create')
                <x-csv-import route="{{ route('admin.search-articles.csv.store') }}" />
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
                            {{ trans('cruds.searchArticle.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.searchArticle.fields.authors') }}
                            @include('components.table.sort', ['field' => 'authors.author_name'])
                        </th>
                        <th>
                            {{ trans('cruds.searchArticle.fields.journal_title') }}
                            @include('components.table.sort', ['field' => 'journal_title.journal_title'])
                        </th>
                        <th>
                            {{ trans('cruds.searchArticle.fields.issn_type') }}
                            @include('components.table.sort', ['field' => 'issn_type.issn_type'])
                        </th>
                        <th>
                            {{ trans('cruds.searchArticle.fields.journal_issn') }}
                            @include('components.table.sort', ['field' => 'journal_issn.journal_issn'])
                        </th>
                        <th>
                            {{ trans('cruds.searchArticle.fields.journal_url') }}
                            @include('components.table.sort', ['field' => 'journal_url.journal_url'])
                        </th>
                        <th>
                            {{ trans('cruds.journalDetail.fields.journal_url') }}
                            @include('components.table.sort', ['field' => 'journal_url.journal_url'])
                        </th>
                        <th>
                            {{ trans('cruds.searchArticle.fields.publisher_name') }}
                            @include('components.table.sort', ['field' => 'publisher_name.publisher_name'])
                        </th>
                        <th>
                            {{ trans('cruds.searchArticle.fields.abstract_title') }}
                            @include('components.table.sort', ['field' => 'abstract_title'])
                        </th>
                        <th>
                            {{ trans('cruds.searchArticle.fields.description') }}
                            @include('components.table.sort', ['field' => 'description'])
                        </th>
                        <th>
                            {{ trans('cruds.searchArticle.fields.link_to_journal') }}
                            @include('components.table.sort', ['field' => 'link_to_journal'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($searchArticles as $searchArticle)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $searchArticle->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $searchArticle->id }}
                            </td>
                            <td>
                                @if($searchArticle->authors)
                                    <span class="badge badge-relationship">{{ $searchArticle->authors->author_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($searchArticle->journalTitle)
                                    <span class="badge badge-relationship">{{ $searchArticle->journalTitle->journal_title ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($searchArticle->issnType)
                                    <span class="badge badge-relationship">{{ $searchArticle->issnType->issn_type ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($searchArticle->journalIssn)
                                    <span class="badge badge-relationship">{{ $searchArticle->journalIssn->journal_issn ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($searchArticle->journalUrl)
                                    <span class="badge badge-relationship">{{ $searchArticle->journalUrl->journal_url ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($searchArticle->journalUrl)
                                    {{ $searchArticle->journalUrl->journal_url ?? '' }}
                                @endif
                            </td>
                            <td>
                                @if($searchArticle->publisherName)
                                    <span class="badge badge-relationship">{{ $searchArticle->publisherName->publisher_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $searchArticle->abstract_title }}
                            </td>
                            <td>
                                {{ $searchArticle->description }}
                            </td>
                            <td>
                                {{ $searchArticle->link_to_journal }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('search_article_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.search-articles.show', $searchArticle) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('search_article_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.search-articles.edit', $searchArticle) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('search_article_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $searchArticle->id }})" wire:loading.attr="disabled">
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
            {{ $searchArticles->links() }}
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