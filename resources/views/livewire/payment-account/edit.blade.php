<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('paymentAccount.bank_account_number') ? 'invalid' : '' }}">
        <label class="form-label" for="bank_account_number">{{ trans('cruds.paymentAccount.fields.bank_account_number') }}</label>
        <input class="form-control" type="number" name="bank_account_number" id="bank_account_number" wire:model.defer="paymentAccount.bank_account_number" step="1">
        <div class="validation-message">
            {{ $errors->first('paymentAccount.bank_account_number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.paymentAccount.fields.bank_account_number_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('paymentAccount.bank_name') ? 'invalid' : '' }}">
        <label class="form-label" for="bank_name">{{ trans('cruds.paymentAccount.fields.bank_name') }}</label>
        <input class="form-control" type="text" name="bank_name" id="bank_name" wire:model.defer="paymentAccount.bank_name">
        <div class="validation-message">
            {{ $errors->first('paymentAccount.bank_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.paymentAccount.fields.bank_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('paymentAccount.bank_branch') ? 'invalid' : '' }}">
        <label class="form-label" for="bank_branch">{{ trans('cruds.paymentAccount.fields.bank_branch') }}</label>
        <input class="form-control" type="text" name="bank_branch" id="bank_branch" wire:model.defer="paymentAccount.bank_branch">
        <div class="validation-message">
            {{ $errors->first('paymentAccount.bank_branch') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.paymentAccount.fields.bank_branch_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('paymentAccount.ifsc_code') ? 'invalid' : '' }}">
        <label class="form-label" for="ifsc_code">{{ trans('cruds.paymentAccount.fields.ifsc_code') }}</label>
        <input class="form-control" type="text" name="ifsc_code" id="ifsc_code" wire:model.defer="paymentAccount.ifsc_code">
        <div class="validation-message">
            {{ $errors->first('paymentAccount.ifsc_code') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.paymentAccount.fields.ifsc_code_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('paymentAccount.paypal_email') ? 'invalid' : '' }}">
        <label class="form-label" for="paypal_email">{{ trans('cruds.paymentAccount.fields.paypal_email') }}</label>
        <input class="form-control" type="email" name="paypal_email" id="paypal_email" wire:model.defer="paymentAccount.paypal_email">
        <div class="validation-message">
            {{ $errors->first('paymentAccount.paypal_email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.paymentAccount.fields.paypal_email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('paymentAccount.upi_mobile_number') ? 'invalid' : '' }}">
        <label class="form-label" for="upi_mobile_number">{{ trans('cruds.paymentAccount.fields.upi_mobile_number') }}</label>
        <input class="form-control" type="text" name="upi_mobile_number" id="upi_mobile_number" wire:model.defer="paymentAccount.upi_mobile_number">
        <div class="validation-message">
            {{ $errors->first('paymentAccount.upi_mobile_number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.paymentAccount.fields.upi_mobile_number_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('paymentAccount.upi') ? 'invalid' : '' }}">
        <label class="form-label" for="upi">{{ trans('cruds.paymentAccount.fields.upi') }}</label>
        <input class="form-control" type="text" name="upi" id="upi" wire:model.defer="paymentAccount.upi">
        <div class="validation-message">
            {{ $errors->first('paymentAccount.upi') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.paymentAccount.fields.upi_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.payment-accounts.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>