@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.paymentStatus.title_singular') }}:
                    {{ trans('cruds.paymentStatus.fields.id') }}
                    {{ $paymentStatus->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.paymentStatus.fields.id') }}
                            </th>
                            <td>
                                {{ $paymentStatus->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.paymentStatus.fields.order_title') }}
                            </th>
                            <td>
                                @if($paymentStatus->orderTitle)
                                    <span class="badge badge-relationship">{{ $paymentStatus->orderTitle->title ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.paymentStatus.fields.payment_cost') }}
                            </th>
                            <td>
                                @if($paymentStatus->paymentCost)
                                    <span class="badge badge-relationship">{{ $paymentStatus->paymentCost->final_pay ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.paymentStatus.fields.paid_cost') }}
                            </th>
                            <td>
                                {{ $paymentStatus->paid_cost }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.paymentStatus.fields.payment_status') }}
                            </th>
                            <td>
                                {{ $paymentStatus->payment_status_label }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('payment_status_edit')
                    <a href="{{ route('admin.payment-statuses.edit', $paymentStatus) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.payment-statuses.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection