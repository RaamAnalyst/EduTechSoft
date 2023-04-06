@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.delivery.title_singular') }}:
                    {{ trans('cruds.delivery.fields.id') }}
                    {{ $delivery->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('delivery.edit', [$delivery])
        </div>
    </div>
</div>
@endsection