<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentAccountRequest;
use App\Http\Requests\UpdatePaymentAccountRequest;
use App\Http\Resources\Admin\PaymentAccountResource;
use App\Models\PaymentAccount;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PaymentAccountApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('payment_account_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PaymentAccountResource(PaymentAccount::with(['owner'])->get());
    }

    public function store(StorePaymentAccountRequest $request)
    {
        $paymentAccount = PaymentAccount::create($request->validated());

        return (new PaymentAccountResource($paymentAccount))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PaymentAccount $paymentAccount)
    {
        abort_if(Gate::denies('payment_account_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PaymentAccountResource($paymentAccount->load(['owner']));
    }

    public function update(UpdatePaymentAccountRequest $request, PaymentAccount $paymentAccount)
    {
        $paymentAccount->update($request->validated());

        return (new PaymentAccountResource($paymentAccount))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PaymentAccount $paymentAccount)
    {
        abort_if(Gate::denies('payment_account_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paymentAccount->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
