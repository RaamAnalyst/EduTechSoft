<?php

namespace App\Http\Livewire\Delivery;

use App\Models\Delivery;
use App\Models\Order;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public Delivery $delivery;

    public array $listsForFields = [];

    public function mount(Delivery $delivery)
    {
        $this->delivery = $delivery;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.delivery.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->delivery->save();

        return redirect()->route('admin.deliveries.index');
    }

    protected function rules(): array
    {
        return [
            'delivery.order_title_id' => [
                'integer',
                'exists:orders,id',
                'nullable',
            ],
            'delivery.delivery_due_id' => [
                'integer',
                'exists:orders,id',
                'nullable',
            ],
            'delivery.delivery_status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['delivery_status'])),
            ],
            'delivery.user_name_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['order_title']     = Order::pluck('title', 'id')->toArray();
        $this->listsForFields['delivery_due']    = Order::pluck('due_date', 'id')->toArray();
        $this->listsForFields['delivery_status'] = $this->delivery::DELIVERY_STATUS_SELECT;
        $this->listsForFields['user_name']       = User::pluck('name', 'id')->toArray();
    }
}
