@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.paymentAccount.title_singular') }}:
                    {{ trans('cruds.paymentAccount.fields.id') }}
                    {{ $paymentAccount->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.paymentAccount.fields.id') }}
                            </th>
                            <td>
                                {{ $paymentAccount->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.paymentAccount.fields.bank_account_number') }}
                            </th>
                            <td>
                                {{ $paymentAccount->bank_account_number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.paymentAccount.fields.bank_name') }}
                            </th>
                            <td>
                                {{ $paymentAccount->bank_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.paymentAccount.fields.bank_branch') }}
                            </th>
                            <td>
                                {{ $paymentAccount->bank_branch }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.paymentAccount.fields.ifsc_code') }}
                            </th>
                            <td>
                                {{ $paymentAccount->ifsc_code }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.paymentAccount.fields.paypal_email') }}
                            </th>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $paymentAccount->paypal_email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $paymentAccount->paypal_email }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.paymentAccount.fields.upi_mobile_number') }}
                            </th>
                            <td>
                                {{ $paymentAccount->upi_mobile_number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.paymentAccount.fields.upi') }}
                            </th>
                            <td>
                                {{ $paymentAccount->upi }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('payment_account_edit')
                    <a href="{{ route('admin.payment-accounts.edit', $paymentAccount) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.payment-accounts.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection