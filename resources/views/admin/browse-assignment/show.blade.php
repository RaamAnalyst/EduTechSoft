@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.browseAssignment.title_singular') }}:
                    {{ trans('cruds.browseAssignment.fields.id') }}
                    {{ $browseAssignment->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.browseAssignment.fields.id') }}
                            </th>
                            <td>
                                {{ $browseAssignment->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.browseAssignment.fields.title') }}
                            </th>
                            <td>
                                {{ $browseAssignment->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.browseAssignment.fields.question') }}
                            </th>
                            <td>
                                {{ $browseAssignment->question }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.browseAssignment.fields.solution') }}
                            </th>
                            <td>
                                {{ $browseAssignment->solution }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.browseAssignment.fields.categories') }}
                            </th>
                            <td>
                                @if($browseAssignment->categories)
                                    <span class="badge badge-relationship">{{ $browseAssignment->categories->categories ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.browseAssignment.fields.tags') }}
                            </th>
                            <td>
                                @if($browseAssignment->tags)
                                    <span class="badge badge-relationship">{{ $browseAssignment->tags->tags ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.browseAssignment.fields.attachments') }}
                            </th>
                            <td>
                                @foreach($browseAssignment->attachments as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('browse_assignment_edit')
                    <a href="{{ route('admin.browse-assignments.edit', $browseAssignment) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.browse-assignments.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection