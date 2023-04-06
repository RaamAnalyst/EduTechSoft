<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('order.service_type_id') ? 'invalid' : '' }}">
        <label class="form-label" for="service_type">{{ trans('cruds.order.fields.service_type') }}</label>
        <x-select-list class="form-control" id="service_type" name="service_type" :options="$this->listsForFields['service_type']" wire:model="order.service_type_id" />
        <div class="validation-message">
            {{ $errors->first('order.service_type_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.order.fields.service_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('order.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.order.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="order.title">
        <div class="validation-message">
            {{ $errors->first('order.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.order.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('order.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.order.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="order.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('order.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.order.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('order.instructions') ? 'invalid' : '' }}">
        <label class="form-label" for="instructions">{{ trans('cruds.order.fields.instructions') }}</label>
        <textarea class="form-control" name="instructions" id="instructions" wire:model.defer="order.instructions" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('order.instructions') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.order.fields.instructions_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('order.due_date') ? 'invalid' : '' }}">
        <label class="form-label" for="due_date">{{ trans('cruds.order.fields.due_date') }}</label>
        <x-date-picker class="form-control" wire:model="order.due_date" id="due_date" name="due_date" />
        <div class="validation-message">
            {{ $errors->first('order.due_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.order.fields.due_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.order_file_upload') ? 'invalid' : '' }}">
        <label class="form-label" for="file_upload">{{ trans('cruds.order.fields.file_upload') }}</label>
        <x-dropzone id="file_upload" name="file_upload" action="{{ route('admin.orders.storeMedia') }}" collection-name="order_file_upload" max-file-size="100" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.order_file_upload') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.order.fields.file_upload_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('order.terms') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="terms" id="terms" wire:model.defer="order.terms">
        <label class="form-label inline ml-1" for="terms">{{ trans('cruds.order.fields.terms') }}</label>
        <div class="validation-message">
            {{ $errors->first('order.terms') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.order.fields.terms_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>