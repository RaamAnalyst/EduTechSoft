<?php

namespace App\Http\Requests;

use App\Models\PaymentStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePaymentStatusRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('payment_status_create'),
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
            'order_title_id' => [
                'integer',
                'exists:orders,id',
                'nullable',
            ],
            'payment_cost_id' => [
                'integer',
                'exists:payments,id',
                'nullable',
            ],
            'paid_cost' => [
                'string',
                'nullable',
            ],
            'payment_status' => [
                'nullable',
                'in:' . implode(',', array_keys(PaymentStatus::PAYMENT_STATUS_SELECT)),
            ],
        ];
    }
}
