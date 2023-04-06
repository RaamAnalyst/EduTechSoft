@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.paymentAccount.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('payment_account_create')
                    <a class="btn btn-indigo" href="{{ route('admin.payment-accounts.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.paymentAccount.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('payment-account.index')

    </div>
</div>
@endsection