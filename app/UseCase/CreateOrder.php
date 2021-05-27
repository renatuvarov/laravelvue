<?php

namespace App\UseCase;

use App\Models\Orders\OrderDto;
use App\Repositories\OrderRepositoryInterface;

class CreateOrder
{
    private OrderRepositoryInterface $orders;

    public function __construct(OrderRepositoryInterface $orders)
    {
        $this->orders = $orders;
    }

    public function handle(OrderDto $dto): void
    {
        $this->orders->save($dto);
    }
}
