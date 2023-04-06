@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.searchArticle.title_singular') }}:
                    {{ trans('cruds.searchArticle.fields.id') }}
                    {{ $searchArticle->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('search-article.edit', [$searchArticle])
        </div>
    </div>
</div>
@endsection