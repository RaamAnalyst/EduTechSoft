<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('order_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Order" format="csv" />
                <livewire:excel-export model="Order" format="xlsx" />
                <livewire:excel-export model="Order" format="pdf" />
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
                            {{ trans('cruds.order.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.service_type') }}
                            @include('components.table.sort', ['field' => 'service_type.service_type'])
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.title') }}
                            @include('components.table.sort', ['field' => 'title'])
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.description') }}
                            @include('components.table.sort', ['field' => 'description'])
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.instructions') }}
                            @include('components.table.sort', ['field' => 'instructions'])
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.due_date') }}
                            @include('components.table.sort', ['field' => 'due_date'])
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.file_upload') }}
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.terms') }}
                            @include('components.table.sort', ['field' => 'terms'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $order->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $order->id }}
                            </td>
                            <td>
                                @if($order->serviceType)
                                    <span class="badge badge-relationship">{{ $order->serviceType->service_type ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $order->title }}
                            </td>
                            <td>
                                {{ $order->description }}
                            </td>
                            <td>
                                {{ $order->instructions }}
                            </td>
                            <td>
                                {{ $order->due_date }}
                            </td>
                            <td>
                                @foreach($order->file_upload as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $order->terms ? 'checked' : '' }}>
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('order_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.orders.show', $order) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('order_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.orders.edit', $order) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('order_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $order->id }})" wire:loading.attr="disabled">
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
            {{ $orders->links() }}
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