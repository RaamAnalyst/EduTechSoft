<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('payment_status_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="PaymentStatus" format="csv" />
                <livewire:excel-export model="PaymentStatus" format="xlsx" />
                <livewire:excel-export model="PaymentStatus" format="pdf" />
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
                            {{ trans('cruds.paymentStatus.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.paymentStatus.fields.order_title') }}
                            @include('components.table.sort', ['field' => 'order_title.title'])
                        </th>
                        <th>
                            {{ trans('cruds.paymentStatus.fields.payment_cost') }}
                            @include('components.table.sort', ['field' => 'payment_cost.final_pay'])
                        </th>
                        <th>
                            {{ trans('cruds.paymentStatus.fields.paid_cost') }}
                            @include('components.table.sort', ['field' => 'paid_cost'])
                        </th>
                        <th>
                            {{ trans('cruds.paymentStatus.fields.payment_status') }}
                            @include('components.table.sort', ['field' => 'payment_status'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($paymentStatuses as $paymentStatus)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $paymentStatus->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $paymentStatus->id }}
                            </td>
                            <td>
                                @if($paymentStatus->orderTitle)
                                    <span class="badge badge-relationship">{{ $paymentStatus->orderTitle->title ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($paymentStatus->paymentCost)
                                    <span class="badge badge-relationship">{{ $paymentStatus->paymentCost->final_pay ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $paymentStatus->paid_cost }}
                            </td>
                            <td>
                                {{ $paymentStatus->payment_status_label }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('payment_status_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.payment-statuses.show', $paymentStatus) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('payment_status_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.payment-statuses.edit', $paymentStatus) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('payment_status_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $paymentStatus->id }})" wire:loading.attr="disabled">
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
            {{ $paymentStatuses->links() }}
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