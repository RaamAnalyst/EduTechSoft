<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('payment_account_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="PaymentAccount" format="csv" />
                <livewire:excel-export model="PaymentAccount" format="xlsx" />
                <livewire:excel-export model="PaymentAccount" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.paymentAccount.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.paymentAccount.fields.bank_account_number') }}
                            @include('components.table.sort', ['field' => 'bank_account_number'])
                        </th>
                        <th>
                            {{ trans('cruds.paymentAccount.fields.bank_name') }}
                            @include('components.table.sort', ['field' => 'bank_name'])
                        </th>
                        <th>
                            {{ trans('cruds.paymentAccount.fields.bank_branch') }}
                            @include('components.table.sort', ['field' => 'bank_branch'])
                        </th>
                        <th>
                            {{ trans('cruds.paymentAccount.fields.ifsc_code') }}
                            @include('components.table.sort', ['field' => 'ifsc_code'])
                        </th>
                        <th>
                            {{ trans('cruds.paymentAccount.fields.paypal_email') }}
                            @include('components.table.sort', ['field' => 'paypal_email'])
                        </th>
                        <th>
                            {{ trans('cruds.paymentAccount.fields.upi_mobile_number') }}
                            @include('components.table.sort', ['field' => 'upi_mobile_number'])
                        </th>
                        <th>
                            {{ trans('cruds.paymentAccount.fields.upi') }}
                            @include('components.table.sort', ['field' => 'upi'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($paymentAccounts as $paymentAccount)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $paymentAccount->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $paymentAccount->id }}
                            </td>
                            <td>
                                {{ $paymentAccount->bank_account_number }}
                            </td>
                            <td>
                                {{ $paymentAccount->bank_name }}
                            </td>
                            <td>
                                {{ $paymentAccount->bank_branch }}
                            </td>
                            <td>
                                {{ $paymentAccount->ifsc_code }}
                            </td>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $paymentAccount->paypal_email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $paymentAccount->paypal_email }}
                                </a>
                            </td>
                            <td>
                                {{ $paymentAccount->upi_mobile_number }}
                            </td>
                            <td>
                                {{ $paymentAccount->upi }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('payment_account_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.payment-accounts.show', $paymentAccount) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('payment_account_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.payment-accounts.edit', $paymentAccount) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('payment_account_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $paymentAccount->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $paymentAccounts->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush