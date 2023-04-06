<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('authorDetail.author_name') ? 'invalid' : '' }}">
        <label class="form-label" for="author_name">{{ trans('cruds.authorDetail.fields.author_name') }}</label>
        <input class="form-control" type="text" name="author_name" id="author_name" wire:model.defer="authorDetail.author_name">
        <div class="validation-message">
            {{ $errors->first('authorDetail.author_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.authorDetail.fields.author_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('authorDetail.author_affiliation') ? 'invalid' : '' }}">
        <label class="form-label" for="author_affiliation">{{ trans('cruds.authorDetail.fields.author_affiliation') }}</label>
        <input class="form-control" type="text" name="author_affiliation" id="author_affiliation" wire:model.defer="authorDetail.author_affiliation">
        <div class="validation-message">
            {{ $errors->first('authorDetail.author_affiliation') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.authorDetail.fields.author_affiliation_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.author-details.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>