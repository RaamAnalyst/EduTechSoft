<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('payment.cost_to_pay') ? 'invalid' : '' }}">
        <label class="form-label" for="cost_to_pay">{{ trans('cruds.payment.fields.cost_to_pay') }}</label>
        <input class="form-control" type="number" name="cost_to_pay" id="cost_to_pay" wire:model.defer="payment.cost_to_pay" step="0.01">
        <div class="validation-message">
            {{ $errors->first('payment.cost_to_pay') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.cost_to_pay_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('payment.discount') ? 'invalid' : '' }}">
        <label class="form-label" for="discount">{{ trans('cruds.payment.fields.discount') }}</label>
        <input class="form-control" type="number" name="discount" id="discount" wire:model.defer="payment.discount" step="1">
        <div class="validation-message">
            {{ $errors->first('payment.discount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.discount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('payment.final_pay') ? 'invalid' : '' }}">
        <label class="form-label" for="final_pay">{{ trans('cruds.payment.fields.final_pay') }}</label>
        <input class="form-control" type="number" name="final_pay" id="final_pay" wire:model.defer="payment.final_pay" step="0.01">
        <div class="validation-message">
            {{ $errors->first('payment.final_pay') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.final_pay_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('payment.order_title_id') ? 'invalid' : '' }}">
        <label class="form-label" for="order_title">{{ trans('cruds.payment.fields.order_title') }}</label>
        <x-select-list class="form-control" id="order_title" name="order_title" :options="$this->listsForFields['order_title']" wire:model="payment.order_title_id" />
        <div class="validation-message">
            {{ $errors->first('payment.order_title_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.order_title_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.payments.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>