@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.service.title_singular') }}:
                    {{ trans('cruds.service.fields.id') }}
                    {{ $service->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.service.fields.id') }}
                            </th>
                            <td>
                                {{ $service->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.service.fields.service_type') }}
                            </th>
                            <td>
                                {{ $service->service_type }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('service_edit')
                    <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection