<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('journalDetail.journal_title') ? 'invalid' : '' }}">
        <label class="form-label" for="journal_title">{{ trans('cruds.journalDetail.fields.journal_title') }}</label>
        <input class="form-control" type="text" name="journal_title" id="journal_title" wire:model.defer="journalDetail.journal_title">
        <div class="validation-message">
            {{ $errors->first('journalDetail.journal_title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.journalDetail.fields.journal_title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('journalDetail.journal_issn') ? 'invalid' : '' }}">
        <label class="form-label" for="journal_issn">{{ trans('cruds.journalDetail.fields.journal_issn') }}</label>
        <input class="form-control" type="text" name="journal_issn" id="journal_issn" wire:model.defer="journalDetail.journal_issn">
        <div class="validation-message">
            {{ $errors->first('journalDetail.journal_issn') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.journalDetail.fields.journal_issn_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('journalDetail.issn_type') ? 'invalid' : '' }}">
        <label class="form-label" for="issn_type">{{ trans('cruds.journalDetail.fields.issn_type') }}</label>
        <input class="form-control" type="text" name="issn_type" id="issn_type" wire:model.defer="journalDetail.issn_type">
        <div class="validation-message">
            {{ $errors->first('journalDetail.issn_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.journalDetail.fields.issn_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('journalDetail.journal_url') ? 'invalid' : '' }}">
        <label class="form-label" for="journal_url">{{ trans('cruds.journalDetail.fields.journal_url') }}</label>
        <textarea class="form-control" name="journal_url" id="journal_url" wire:model.defer="journalDetail.journal_url" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('journalDetail.journal_url') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.journalDetail.fields.journal_url_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.journal-details.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>