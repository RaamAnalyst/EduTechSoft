<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('service.service_type') ? 'invalid' : '' }}">
        <label class="form-label" for="service_type">{{ trans('cruds.service.fields.service_type') }}</label>
        <input class="form-control" type="text" name="service_type" id="service_type" wire:model.defer="service.service_type">
        <div class="validation-message">
            {{ $errors->first('service.service_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.service.fields.service_type_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>