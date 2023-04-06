<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('delivery_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Delivery" format="csv" />
                <livewire:excel-export model="Delivery" format="xlsx" />
                <livewire:excel-export model="Delivery" format="pdf" />
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
                            {{ trans('cruds.delivery.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.delivery.fields.order_title') }}
                            @include('components.table.sort', ['field' => 'order_title.title'])
                        </th>
                        <th>
                            {{ trans('cruds.delivery.fields.delivery_due') }}
                            @include('components.table.sort', ['field' => 'delivery_due.due_date'])
                        </th>
                        <th>
                            {{ trans('cruds.delivery.fields.delivery_status') }}
                            @include('components.table.sort', ['field' => 'delivery_status'])
                        </th>
                        <th>
                            {{ trans('cruds.delivery.fields.user_name') }}
                            @include('components.table.sort', ['field' => 'user_name.name'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($deliveries as $delivery)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $delivery->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $delivery->id }}
                            </td>
                            <td>
                                @if($delivery->orderTitle)
                                    <span class="badge badge-relationship">{{ $delivery->orderTitle->title ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($delivery->deliveryDue)
                                    <span class="badge badge-relationship">{{ $delivery->deliveryDue->due_date ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $delivery->delivery_status_label }}
                            </td>
                            <td>
                                @if($delivery->userName)
                                    <span class="badge badge-relationship">{{ $delivery->userName->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('delivery_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.deliveries.show', $delivery) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('delivery_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.deliveries.edit', $delivery) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('delivery_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $delivery->id }})" wire:loading.attr="disabled">
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
            {{ $deliveries->links() }}
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