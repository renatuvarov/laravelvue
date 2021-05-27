<?php

namespace App\Repositories;

use App\Models\Orders\OrderDto;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redis;

class RedisRepository extends AbstractRepository
{
    public function all(): Collection
    {
        return collect(json_decode(Redis::get('orders', '[]'), true));
    }

    public function save(OrderDto $dto): void
    {
        $orders = $this->all();
        $orders->add($this->factory->makeArrayModel($dto));
        Redis::set('orders', $orders->toJson());
    }

    public static function type(): string
    {
        return 'Redis';
    }
}
