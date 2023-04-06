@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.authorDetail.title_singular') }}:
                    {{ trans('cruds.authorDetail.fields.id') }}
                    {{ $authorDetail->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.authorDetail.fields.id') }}
                            </th>
                            <td>
                                {{ $authorDetail->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.authorDetail.fields.author_name') }}
                            </th>
                            <td>
                                {{ $authorDetail->author_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.authorDetail.fields.author_affiliation') }}
                            </th>
                            <td>
                                {{ $authorDetail->author_affiliation }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('author_detail_edit')
                    <a href="{{ route('admin.author-details.edit', $authorDetail) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.author-details.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection