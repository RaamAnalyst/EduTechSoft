<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('browseAssignment.title') ? 'invalid' : '' }}">
        <label class="form-label" for="title">{{ trans('cruds.browseAssignment.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" wire:model.defer="browseAssignment.title">
        <div class="validation-message">
            {{ $errors->first('browseAssignment.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.browseAssignment.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('browseAssignment.question') ? 'invalid' : '' }}">
        <label class="form-label" for="question">{{ trans('cruds.browseAssignment.fields.question') }}</label>
        <textarea class="form-control" name="question" id="question" wire:model.defer="browseAssignment.question" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('browseAssignment.question') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.browseAssignment.fields.question_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('browseAssignment.solution') ? 'invalid' : '' }}">
        <label class="form-label" for="solution">{{ trans('cruds.browseAssignment.fields.solution') }}</label>
        <textarea class="form-control" name="solution" id="solution" wire:model.defer="browseAssignment.solution" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('browseAssignment.solution') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.browseAssignment.fields.solution_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('browseAssignment.categories_id') ? 'invalid' : '' }}">
        <label class="form-label" for="categories">{{ trans('cruds.browseAssignment.fields.categories') }}</label>
        <x-select-list class="form-control" id="categories" name="categories" :options="$this->listsForFields['categories']" wire:model="browseAssignment.categories_id" />
        <div class="validation-message">
            {{ $errors->first('browseAssignment.categories_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.browseAssignment.fields.categories_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('browseAssignment.tags_id') ? 'invalid' : '' }}">
        <label class="form-label" for="tags">{{ trans('cruds.browseAssignment.fields.tags') }}</label>
        <x-select-list class="form-control" id="tags" name="tags" :options="$this->listsForFields['tags']" wire:model="browseAssignment.tags_id" />
        <div class="validation-message">
            {{ $errors->first('browseAssignment.tags_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.browseAssignment.fields.tags_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.browse_assignment_attachments') ? 'invalid' : '' }}">
        <label class="form-label" for="attachments">{{ trans('cruds.browseAssignment.fields.attachments') }}</label>
        <x-dropzone id="attachments" name="attachments" action="{{ route('admin.browse-assignments.storeMedia') }}" collection-name="browse_assignment_attachments" max-file-size="100" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.browse_assignment_attachments') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.browseAssignment.fields.attachments_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.browse-assignments.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>