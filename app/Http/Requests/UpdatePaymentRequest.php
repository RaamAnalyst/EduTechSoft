<?php

namespace App\Http\Requests;

use App\Models\Payment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePaymentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('payment_edit'),
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
            'cost_to_pay' => [
                'numeric',
                'nullable',
            ],
            'discount' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'final_pay' => [
                'numeric',
                'nullable',
            ],
            'order_title_id' => [
                'integer',
                'exists:orders,id',
                'nullable',
            ],
        ];
    }
}
