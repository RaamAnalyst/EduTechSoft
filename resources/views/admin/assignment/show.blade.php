@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.assignment.title_singular') }}:
                    {{ trans('cruds.assignment.fields.id') }}
                    {{ $assignment->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.assignment.fields.id') }}
                            </th>
                            <td>
                                {{ $assignment->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.assignment.fields.course_title') }}
                            </th>
                            <td>
                                @if($assignment->courseTitle)
                                    <span class="badge badge-relationship">{{ $assignment->courseTitle->title ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.assignment.fields.assignment_title') }}
                            </th>
                            <td>
                                {{ $assignment->assignment_title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.assignment.fields.assignment_description') }}
                            </th>
                            <td>
                                {{ $assignment->assignment_description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.assignment.fields.support_files') }}
                            </th>
                            <td>
                                @foreach($assignment->support_files as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.assignment.fields.assignment_due_date') }}
                            </th>
                            <td>
                                {{ $assignment->assignment_due_date }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('assignment_edit')
                    <a href="{{ route('admin.assignments.edit', $assignment) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.assignments.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection