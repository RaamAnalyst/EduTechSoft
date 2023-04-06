<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('assignment.course_title_id') ? 'invalid' : '' }}">
        <label class="form-label" for="course_title">{{ trans('cruds.assignment.fields.course_title') }}</label>
        <x-select-list class="form-control" id="course_title" name="course_title" :options="$this->listsForFields['course_title']" wire:model="assignment.course_title_id" />
        <div class="validation-message">
            {{ $errors->first('assignment.course_title_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.assignment.fields.course_title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('assignment.assignment_title') ? 'invalid' : '' }}">
        <label class="form-label" for="assignment_title">{{ trans('cruds.assignment.fields.assignment_title') }}</label>
        <input class="form-control" type="text" name="assignment_title" id="assignment_title" wire:model.defer="assignment.assignment_title">
        <div class="validation-message">
            {{ $errors->first('assignment.assignment_title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.assignment.fields.assignment_title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('assignment.assignment_description') ? 'invalid' : '' }}">
        <label class="form-label" for="assignment_description">{{ trans('cruds.assignment.fields.assignment_description') }}</label>
        <textarea class="form-control" name="assignment_description" id="assignment_description" wire:model.defer="assignment.assignment_description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('assignment.assignment_description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.assignment.fields.assignment_description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.assignment_support_files') ? 'invalid' : '' }}">
        <label class="form-label" for="support_files">{{ trans('cruds.assignment.fields.support_files') }}</label>
        <x-dropzone id="support_files" name="support_files" action="{{ route('admin.assignments.storeMedia') }}" collection-name="assignment_support_files" max-file-size="100" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.assignment_support_files') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.assignment.fields.support_files_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('assignment.assignment_due_date') ? 'invalid' : '' }}">
        <label class="form-label" for="assignment_due_date">{{ trans('cruds.assignment.fields.assignment_due_date') }}</label>
        <x-date-picker class="form-control" wire:model="assignment.assignment_due_date" id="assignment_due_date" name="assignment_due_date" />
        <div class="validation-message">
            {{ $errors->first('assignment.assignment_due_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.assignment.fields.assignment_due_date_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.assignments.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>