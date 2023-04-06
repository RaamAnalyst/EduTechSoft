<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentAccount;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PaymentAccountController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('payment_account_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.payment-account.index');
    }

    public function create()
    {
        abort_if(Gate::denies('payment_account_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.payment-account.create');
    }

    public function edit(PaymentAccount $paymentAccount)
    {
        abort_if(Gate::denies('payment_account_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.payment-account.edit', compact('paymentAccount'));
    }

    public function show(PaymentAccount $paymentAccount)
    {
        abort_if(Gate::denies('payment_account_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paymentAccount->load('owner');

        return view('admin.payment-account.show', compact('paymentAccount'));
    }
}
