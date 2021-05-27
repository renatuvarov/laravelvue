<?php

namespace App\Repositories;

use App\Models\Orders\OrderDto;
use Illuminate\Support\Collection;

interface OrderRepositoryInterface
{
    public function all(): Collection;

    public function allDesc(): Collection;

    public function save(OrderDto $dto): void;
}
