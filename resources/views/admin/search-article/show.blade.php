@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.searchArticle.title_singular') }}:
                    {{ trans('cruds.searchArticle.fields.id') }}
                    {{ $searchArticle->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.searchArticle.fields.id') }}
                            </th>
                            <td>
                                {{ $searchArticle->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.searchArticle.fields.authors') }}
                            </th>
                            <td>
                                @if($searchArticle->authors)
                                    <span class="badge badge-relationship">{{ $searchArticle->authors->author_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.searchArticle.fields.journal_title') }}
                            </th>
                            <td>
                                @if($searchArticle->journalTitle)
                                    <span class="badge badge-relationship">{{ $searchArticle->journalTitle->journal_title ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.searchArticle.fields.issn_type') }}
                            </th>
                            <td>
                                @if($searchArticle->issnType)
                                    <span class="badge badge-relationship">{{ $searchArticle->issnType->issn_type ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.searchArticle.fields.journal_issn') }}
                            </th>
                            <td>
                                @if($searchArticle->journalIssn)
                                    <span class="badge badge-relationship">{{ $searchArticle->journalIssn->journal_issn ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.searchArticle.fields.journal_url') }}
                            </th>
                            <td>
                                @if($searchArticle->journalUrl)
                                    <span class="badge badge-relationship">{{ $searchArticle->journalUrl->journal_url ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.searchArticle.fields.publisher_name') }}
                            </th>
                            <td>
                                @if($searchArticle->publisherName)
                                    <span class="badge badge-relationship">{{ $searchArticle->publisherName->publisher_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.searchArticle.fields.abstract_title') }}
                            </th>
                            <td>
                                {{ $searchArticle->abstract_title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.searchArticle.fields.description') }}
                            </th>
                            <td>
                                {{ $searchArticle->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.searchArticle.fields.link_to_journal') }}
                            </th>
                            <td>
                                {{ $searchArticle->link_to_journal }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('search_article_edit')
                    <a href="{{ route('admin.search-articles.edit', $searchArticle) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.search-articles.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection