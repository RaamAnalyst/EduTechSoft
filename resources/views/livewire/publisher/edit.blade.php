<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('publisher.publisher_name') ? 'invalid' : '' }}">
        <label class="form-label" for="publisher_name">{{ trans('cruds.publisher.fields.publisher_name') }}</label>
        <input class="form-control" type="text" name="publisher_name" id="publisher_name" wire:model.defer="publisher.publisher_name">
        <div class="validation-message">
            {{ $errors->first('publisher.publisher_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.publisher.fields.publisher_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('publisher.publisher_language') ? 'invalid' : '' }}">
        <label class="form-label" for="publisher_language">{{ trans('cruds.publisher.fields.publisher_language') }}</label>
        <input class="form-control" type="text" name="publisher_language" id="publisher_language" wire:model.defer="publisher.publisher_language">
        <div class="validation-message">
            {{ $errors->first('publisher.publisher_language') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.publisher.fields.publisher_language_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('publisher.publisher_title') ? 'invalid' : '' }}">
        <label class="form-label" for="publisher_title">{{ trans('cruds.publisher.fields.publisher_title') }}</label>
        <input class="form-control" type="text" name="publisher_title" id="publisher_title" wire:model.defer="publisher.publisher_title">
        <div class="validation-message">
            {{ $errors->first('publisher.publisher_title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.publisher.fields.publisher_title_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.publishers.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>