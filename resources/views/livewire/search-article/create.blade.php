<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('searchArticle.authors_id') ? 'invalid' : '' }}">
        <label class="form-label" for="authors">{{ trans('cruds.searchArticle.fields.authors') }}</label>
        <x-select-list class="form-control" id="authors" name="authors" :options="$this->listsForFields['authors']" wire:model="searchArticle.authors_id" />
        <div class="validation-message">
            {{ $errors->first('searchArticle.authors_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.searchArticle.fields.authors_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('searchArticle.journal_title_id') ? 'invalid' : '' }}">
        <label class="form-label" for="journal_title">{{ trans('cruds.searchArticle.fields.journal_title') }}</label>
        <x-select-list class="form-control" id="journal_title" name="journal_title" :options="$this->listsForFields['journal_title']" wire:model="searchArticle.journal_title_id" />
        <div class="validation-message">
            {{ $errors->first('searchArticle.journal_title_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.searchArticle.fields.journal_title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('searchArticle.issn_type_id') ? 'invalid' : '' }}">
        <label class="form-label" for="issn_type">{{ trans('cruds.searchArticle.fields.issn_type') }}</label>
        <x-select-list class="form-control" id="issn_type" name="issn_type" :options="$this->listsForFields['issn_type']" wire:model="searchArticle.issn_type_id" />
        <div class="validation-message">
            {{ $errors->first('searchArticle.issn_type_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.searchArticle.fields.issn_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('searchArticle.journal_issn_id') ? 'invalid' : '' }}">
        <label class="form-label" for="journal_issn">{{ trans('cruds.searchArticle.fields.journal_issn') }}</label>
        <x-select-list class="form-control" id="journal_issn" name="journal_issn" :options="$this->listsForFields['journal_issn']" wire:model="searchArticle.journal_issn_id" />
        <div class="validation-message">
            {{ $errors->first('searchArticle.journal_issn_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.searchArticle.fields.journal_issn_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('searchArticle.journal_url_id') ? 'invalid' : '' }}">
        <label class="form-label" for="journal_url">{{ trans('cruds.searchArticle.fields.journal_url') }}</label>
        <x-select-list class="form-control" id="journal_url" name="journal_url" :options="$this->listsForFields['journal_url']" wire:model="searchArticle.journal_url_id" />
        <div class="validation-message">
            {{ $errors->first('searchArticle.journal_url_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.searchArticle.fields.journal_url_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('searchArticle.publisher_name_id') ? 'invalid' : '' }}">
        <label class="form-label" for="publisher_name">{{ trans('cruds.searchArticle.fields.publisher_name') }}</label>
        <x-select-list class="form-control" id="publisher_name" name="publisher_name" :options="$this->listsForFields['publisher_name']" wire:model="searchArticle.publisher_name_id" />
        <div class="validation-message">
            {{ $errors->first('searchArticle.publisher_name_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.searchArticle.fields.publisher_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('searchArticle.abstract_title') ? 'invalid' : '' }}">
        <label class="form-label" for="abstract_title">{{ trans('cruds.searchArticle.fields.abstract_title') }}</label>
        <textarea class="form-control" name="abstract_title" id="abstract_title" wire:model.defer="searchArticle.abstract_title" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('searchArticle.abstract_title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.searchArticle.fields.abstract_title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('searchArticle.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.searchArticle.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="searchArticle.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('searchArticle.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.searchArticle.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('searchArticle.link_to_journal') ? 'invalid' : '' }}">
        <label class="form-label" for="link_to_journal">{{ trans('cruds.searchArticle.fields.link_to_journal') }}</label>
        <textarea class="form-control" name="link_to_journal" id="link_to_journal" wire:model.defer="searchArticle.link_to_journal" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('searchArticle.link_to_journal') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.searchArticle.fields.link_to_journal_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.search-articles.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>