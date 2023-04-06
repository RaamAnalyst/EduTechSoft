<?php

namespace App\Http\Requests;

use App\Models\Delivery;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDeliveryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('delivery_edit'),
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
            'delivery_due_id' => [
                'integer',
                'exists:orders,id',
                'nullable',
            ],
            'delivery_status' => [
                'nullable',
                'in:' . implode(',', array_keys(Delivery::DELIVERY_STATUS_SELECT)),
            ],
            'user_name_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }
}
