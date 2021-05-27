<?php

namespace App\Repositories;

use App\Models\Orders\Order;
use App\Models\Orders\OrderDto;
use Illuminate\Support\Collection;

class MySqlRepository extends AbstractRepository
{
    public function all(): Collection
    {
        return Order::all();
    }

    public function save(OrderDto $dto): void
    {
        $this
            ->factory
            ->makeForSql($dto)
            ->setConnection('mysql')
            ->save();
    }

    public static function type(): string
    {
        return 'MySQL';
    }
}
