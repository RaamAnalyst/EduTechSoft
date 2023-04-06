<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('keyword.keywords') ? 'invalid' : '' }}">
        <label class="form-label" for="keywords">{{ trans('cruds.keyword.fields.keywords') }}</label>
        <textarea class="form-control" name="keywords" id="keywords" wire:model.defer="keyword.keywords" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('keyword.keywords') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.keyword.fields.keywords_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.keywords.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>