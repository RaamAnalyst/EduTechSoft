<?php

namespace App\Http\Requests;

use App\Models\PaymentAccount;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePaymentAccountRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('payment_account_create'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'bank_account_number' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'bank_name' => [
                'string',
                'nullable',
            ],
            'bank_branch' => [
                'string',
                'nullable',
            ],
            'ifsc_code' => [
                'string',
                'nullable',
            ],
            'paypal_email' => [
                'email:rfc',
                'nullable',
            ],
            'upi_mobile_number' => [
                'string',
                'nullable',
            ],
            'upi' => [
                'string',
                'nullable',
            ],
        ];
    }
}
