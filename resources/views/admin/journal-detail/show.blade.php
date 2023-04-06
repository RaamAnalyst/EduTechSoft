@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.journalDetail.title_singular') }}:
                    {{ trans('cruds.journalDetail.fields.id') }}
                    {{ $journalDetail->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.journalDetail.fields.id') }}
                            </th>
                            <td>
                                {{ $journalDetail->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.journalDetail.fields.journal_title') }}
                            </th>
                            <td>
                                {{ $journalDetail->journal_title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.journalDetail.fields.journal_issn') }}
                            </th>
                            <td>
                                {{ $journalDetail->journal_issn }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.journalDetail.fields.issn_type') }}
                            </th>
                            <td>
                                {{ $journalDetail->issn_type }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.journalDetail.fields.journal_url') }}
                            </th>
                            <td>
                                {{ $journalDetail->journal_url }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('journal_detail_edit')
                    <a href="{{ route('admin.journal-details.edit', $journalDetail) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.journal-details.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection