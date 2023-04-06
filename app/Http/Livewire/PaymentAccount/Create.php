<?php

namespace App\Http\Livewire\PaymentAccount;

use App\Models\PaymentAccount;
use Livewire\Component;

class Create extends Component
{
    public PaymentAccount $paymentAccount;

    public function mount(PaymentAccount $paymentAccount)
    {
        $this->paymentAccount = $paymentAccount;
    }

    public function render()
    {
        return view('livewire.payment-account.create');
    }

    public function submit()
    {
        $this->validate();

        $this->paymentAccount->save();

        return redirect()->route('admin.payment-accounts.index');
    }

    protected function rules(): array
    {
        return [
            'paymentAccount.bank_account_number' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'paymentAccount.bank_name' => [
                'string',
                'nullable',
            ],
            'paymentAccount.bank_branch' => [
                'string',
                'nullable',
            ],
            'paymentAccount.ifsc_code' => [
                'string',
                'nullable',
            ],
            'paymentAccount.paypal_email' => [
                'email:rfc',
                'nullable',
            ],
            'paymentAccount.upi_mobile_number' => [
                'string',
                'nullable',
            ],
            'paymentAccount.upi' => [
                'string',
                'nullable',
            ],
        ];
    }
}
