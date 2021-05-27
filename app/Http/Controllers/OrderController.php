<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Repositories\OrderRepositoryInterface;
use App\UseCase\CreateOrder;

class OrderController extends Controller
{
    public function order(OrderRequest $request, CreateOrder $handler)
    {
        $handler->handle($request->getDto());

        return response()->json(['status' => 'success']);
    }

    public function orders(OrderRepositoryInterface $orders)
    {
        $orders = $orders->allDesc();

        return response()->json([
            'repository' => config('main.class')::type(),
            'orders' => $orders,
        ]);
    }
}
