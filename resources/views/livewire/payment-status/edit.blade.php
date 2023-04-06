<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('paymentStatus.order_title_id') ? 'invalid' : '' }}">
        <label class="form-label" for="order_title">{{ trans('cruds.paymentStatus.fields.order_title') }}</label>
        <x-select-list class="form-control" id="order_title" name="order_title" :options="$this->listsForFields['order_title']" wire:model="paymentStatus.order_title_id" />
        <div class="validation-message">
            {{ $errors->first('paymentStatus.order_title_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.paymentStatus.fields.order_title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('paymentStatus.payment_cost_id') ? 'invalid' : '' }}">
        <label class="form-label" for="payment_cost">{{ trans('cruds.paymentStatus.fields.payment_cost') }}</label>
        <x-select-list class="form-control" id="payment_cost" name="payment_cost" :options="$this->listsForFields['payment_cost']" wire:model="paymentStatus.payment_cost_id" />
        <div class="validation-message">
            {{ $errors->first('paymentStatus.payment_cost_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.paymentStatus.fields.payment_cost_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('paymentStatus.paid_cost') ? 'invalid' : '' }}">
        <label class="form-label" for="paid_cost">{{ trans('cruds.paymentStatus.fields.paid_cost') }}</label>
        <input class="form-control" type="text" name="paid_cost" id="paid_cost" wire:model.defer="paymentStatus.paid_cost">
        <div class="validation-message">
            {{ $errors->first('paymentStatus.paid_cost') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.paymentStatus.fields.paid_cost_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('paymentStatus.payment_status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.paymentStatus.fields.payment_status') }}</label>
        <select class="form-control" wire:model="paymentStatus.payment_status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['payment_status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('paymentStatus.payment_status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.paymentStatus.fields.payment_status_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.payment-statuses.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>