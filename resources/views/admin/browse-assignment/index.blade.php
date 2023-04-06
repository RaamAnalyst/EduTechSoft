@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.browseAssignment.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('browse_assignment_create')
                    <a class="btn btn-indigo" href="{{ route('admin.browse-assignments.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.browseAssignment.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('browse-assignment.index')

    </div>
</div>
@endsection