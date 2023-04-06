@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.authorDetail.title_singular') }}:
                    {{ trans('cruds.authorDetail.fields.id') }}
                    {{ $authorDetail->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('author-detail.edit', [$authorDetail])
        </div>
    </div>
</div>
@endsection