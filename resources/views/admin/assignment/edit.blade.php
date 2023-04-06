@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.assignment.title_singular') }}:
                    {{ trans('cruds.assignment.fields.id') }}
                    {{ $assignment->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('assignment.edit', [$assignment])
        </div>
    </div>
</div>
@endsection