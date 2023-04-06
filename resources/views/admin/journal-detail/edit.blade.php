@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.journalDetail.title_singular') }}:
                    {{ trans('cruds.journalDetail.fields.id') }}
                    {{ $journalDetail->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('journal-detail.edit', [$journalDetail])
        </div>
    </div>
</div>
@endsection