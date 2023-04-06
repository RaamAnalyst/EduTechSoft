@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.publisher.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('publisher_create')
                    <a class="btn btn-indigo" href="{{ route('admin.publishers.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.publisher.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('publisher.index')

    </div>
</div>
@endsection