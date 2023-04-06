<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('category.categories') ? 'invalid' : '' }}">
        <label class="form-label" for="categories">{{ trans('cruds.category.fields.categories') }}</label>
        <input class="form-control" type="text" name="categories" id="categories" wire:model.defer="category.categories">
        <div class="validation-message">
            {{ $errors->first('category.categories') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.category.fields.categories_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('category.tags') ? 'invalid' : '' }}">
        <label class="form-label" for="tags">{{ trans('cruds.category.fields.tags') }}</label>
        <input class="form-control" type="text" name="tags" id="tags" wire:model.defer="category.tags">
        <div class="validation-message">
            {{ $errors->first('category.tags') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.category.fields.tags_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>