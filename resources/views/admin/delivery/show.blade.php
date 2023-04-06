@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.delivery.title_singular') }}:
                    {{ trans('cruds.delivery.fields.id') }}
                    {{ $delivery->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.delivery.fields.id') }}
                            </th>
                            <td>
                                {{ $delivery->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.delivery.fields.order_title') }}
                            </th>
                            <td>
                                @if($delivery->orderTitle)
                                    <span class="badge badge-relationship">{{ $delivery->orderTitle->title ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.delivery.fields.delivery_due') }}
                            </th>
                            <td>
                                @if($delivery->deliveryDue)
                                    <span class="badge badge-relationship">{{ $delivery->deliveryDue->due_date ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.delivery.fields.delivery_status') }}
                            </th>
                            <td>
                                {{ $delivery->delivery_status_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.delivery.fields.user_name') }}
                            </th>
                            <td>
                                @if($delivery->userName)
                                    <span class="badge badge-relationship">{{ $delivery->userName->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('delivery_edit')
                    <a href="{{ route('admin.deliveries.edit', $delivery) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.deliveries.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection