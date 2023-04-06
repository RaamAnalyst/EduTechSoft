<?php

namespace App\Http\Livewire\PaymentStatus;

use App\Models\Order;
use App\Models\Payment;
use App\Models\PaymentStatus;
use Livewire\Component;

class Edit extends Component
{
    public array $listsForFields = [];

    public PaymentStatus $paymentStatus;

    public function mount(PaymentStatus $paymentStatus)
    {
        $this->paymentStatus = $paymentStatus;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.payment-status.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->paymentStatus->save();

        return redirect()->route('admin.payment-statuses.index');
    }

    protected function rules(): array
    {
        return [
            'paymentStatus.order_title_id' => [
                'integer',
                'exists:orders,id',
                'nullable',
            ],
            'paymentStatus.payment_cost_id' => [
                'integer',
                'exists:payments,id',
                'nullable',
            ],
            'paymentStatus.paid_cost' => [
                'string',
                'nullable',
            ],
            'paymentStatus.payment_status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['payment_status'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['order_title']    = Order::pluck('title', 'id')->toArray();
        $this->listsForFields['payment_cost']   = Payment::pluck('final_pay', 'id')->toArray();
        $this->listsForFields['payment_status'] = $this->paymentStatus::PAYMENT_STATUS_SELECT;
    }
}
