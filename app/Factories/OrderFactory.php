<?php

namespace App\Factories;

use App\Models\Orders\Order;
use App\Models\Orders\OrderDto;
use Illuminate\Support\Str;

class OrderFactory
{
    public function makeForSql(OrderDto $dto): Order
    {
        return Order::make($this->makeArrayData($dto));
    }

    public function makeArrayModel(OrderDto $dto): array
    {
        return $this->makeArrayData($dto);
    }

    private function makeArrayData(OrderDto $dto): array
    {
        return [
            'name' => $dto->getName(),
            'phone' => $dto->getPhone(),
            'message' => $dto->getMessage(),
            'key' => Str::random(10),
            'created_at' => now(),
        ];
    }
}
