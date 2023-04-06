<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('delivery.order_title_id') ? 'invalid' : '' }}">
        <label class="form-label" for="order_title">{{ trans('cruds.delivery.fields.order_title') }}</label>
        <x-select-list class="form-control" id="order_title" name="order_title" :options="$this->listsForFields['order_title']" wire:model="delivery.order_title_id" />
        <div class="validation-message">
            {{ $errors->first('delivery.order_title_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.delivery.fields.order_title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('delivery.delivery_due_id') ? 'invalid' : '' }}">
        <label class="form-label" for="delivery_due">{{ trans('cruds.delivery.fields.delivery_due') }}</label>
        <x-select-list class="form-control" id="delivery_due" name="delivery_due" :options="$this->listsForFields['delivery_due']" wire:model="delivery.delivery_due_id" />
        <div class="validation-message">
            {{ $errors->first('delivery.delivery_due_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.delivery.fields.delivery_due_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('delivery.delivery_status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.delivery.fields.delivery_status') }}</label>
        <select class="form-control" wire:model="delivery.delivery_status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['delivery_status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('delivery.delivery_status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.delivery.fields.delivery_status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('delivery.user_name_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user_name">{{ trans('cruds.delivery.fields.user_name') }}</label>
        <x-select-list class="form-control" id="user_name" name="user_name" :options="$this->listsForFields['user_name']" wire:model="delivery.user_name_id" />
        <div class="validation-message">
            {{ $errors->first('delivery.user_name_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.delivery.fields.user_name_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.deliveries.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>