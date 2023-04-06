@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.payment.title_singular') }}:
                    {{ trans('cruds.payment.fields.id') }}
                    {{ $payment->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.payment.fields.id') }}
                            </th>
                            <td>
                                {{ $payment->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.payment.fields.cost_to_pay') }}
                            </th>
                            <td>
                                {{ $payment->cost_to_pay }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.payment.fields.discount') }}
                            </th>
                            <td>
                                {{ $payment->discount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.payment.fields.final_pay') }}
                            </th>
                            <td>
                                {{ $payment->final_pay }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.payment.fields.order_title') }}
                            </th>
                            <td>
                                @if($payment->orderTitle)
                                    <span class="badge badge-relationship">{{ $payment->orderTitle->title ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('payment_edit')
                    <a href="{{ route('admin.payments.edit', $payment) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.payments.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection