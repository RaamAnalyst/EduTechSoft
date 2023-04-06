<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\Admin\OrderResource;
use App\Models\Order;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrderResource(Order::with(['serviceType', 'owner'])->get());
    }

    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->validated());

        foreach ($request->input('order_file_upload', []) as $file) {
            $order->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('order_file_upload');
        }

        return (new OrderResource($order))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Order $order)
    {
        abort_if(Gate::denies('order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrderResource($order->load(['serviceType', 'owner']));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->validated());

        if (count($order->order_file_upload) > 0) {
            foreach ($order->order_file_upload as $media) {
                if (!in_array($media->file_name, $request->input('order_file_upload', []))) {
                    $media->delete();
                }
            }
        }
        $media = $order->order_file_upload->pluck('file_name')->toArray();
        foreach ($request->input('order_file_upload', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $order->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('order_file_upload');
            }
        }

        return (new OrderResource($order))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Order $order)
    {
        abort_if(Gate::denies('order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
