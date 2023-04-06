<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentStatusRequest;
use App\Http\Requests\UpdatePaymentStatusRequest;
use App\Http\Resources\Admin\PaymentStatusResource;
use App\Models\PaymentStatus;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PaymentStatusApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('payment_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PaymentStatusResource(PaymentStatus::with(['orderTitle', 'paymentCost', 'owner'])->get());
    }

    public function store(StorePaymentStatusRequest $request)
    {
        $paymentStatus = PaymentStatus::create($request->validated());

        return (new PaymentStatusResource($paymentStatus))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PaymentStatus $paymentStatus)
    {
        abort_if(Gate::denies('payment_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PaymentStatusResource($paymentStatus->load(['orderTitle', 'paymentCost', 'owner']));
    }

    public function update(UpdatePaymentStatusRequest $request, PaymentStatus $paymentStatus)
    {
        $paymentStatus->update($request->validated());

        return (new PaymentStatusResource($paymentStatus))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PaymentStatus $paymentStatus)
    {
        abort_if(Gate::denies('payment_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paymentStatus->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
