<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentStatus;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PaymentStatusController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('payment_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.payment-status.index');
    }

    public function create()
    {
        abort_if(Gate::denies('payment_status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.payment-status.create');
    }

    public function edit(PaymentStatus $paymentStatus)
    {
        abort_if(Gate::denies('payment_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.payment-status.edit', compact('paymentStatus'));
    }

    public function show(PaymentStatus $paymentStatus)
    {
        abort_if(Gate::denies('payment_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paymentStatus->load('orderTitle', 'paymentCost', 'owner');

        return view('admin.payment-status.show', compact('paymentStatus'));
    }
}
