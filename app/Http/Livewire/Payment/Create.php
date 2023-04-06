<?php

namespace App\Http\Livewire\Payment;

use App\Models\Order;
use App\Models\Payment;
use Livewire\Component;

class Create extends Component
{
    public Payment $payment;

    public array $listsForFields = [];

    public function mount(Payment $payment)
    {
        $this->payment = $payment;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.payment.create');
    }

    public function submit()
    {
        $this->validate();

        $this->payment->save();

        return redirect()->route('admin.payments.index');
    }

    protected function rules(): array
    {
        return [
            'payment.cost_to_pay' => [
                'numeric',
                'nullable',
            ],
            'payment.discount' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'payment.final_pay' => [
                'numeric',
                'nullable',
            ],
            'payment.order_title_id' => [
                'integer',
                'exists:orders,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['order_title'] = Order::pluck('title', 'id')->toArray();
    }
}
