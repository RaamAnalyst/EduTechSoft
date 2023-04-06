@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.publisher.title_singular') }}:
                    {{ trans('cruds.publisher.fields.id') }}
                    {{ $publisher->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.publisher.fields.id') }}
                            </th>
                            <td>
                                {{ $publisher->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.publisher.fields.publisher_name') }}
                            </th>
                            <td>
                                {{ $publisher->publisher_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.publisher.fields.publisher_language') }}
                            </th>
                            <td>
                                {{ $publisher->publisher_language }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.publisher.fields.publisher_title') }}
                            </th>
                            <td>
                                {{ $publisher->publisher_title }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('publisher_edit')
                    <a href="{{ route('admin.publishers.edit', $publisher) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.publishers.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection