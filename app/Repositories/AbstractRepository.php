<?php

namespace App\Repositories;

use App\Factories\OrderFactory;
use App\Models\Orders\OrderDto;
use Illuminate\Support\Collection;

abstract class AbstractRepository implements OrderRepositoryInterface
{
    protected OrderFactory $factory;

    public function __construct(OrderFactory $factory)
    {
        $this->factory = $factory;
    }

    abstract public static function type(): string;

    abstract public function all(): Collection;

    abstract public function save(OrderDto $dto): void;

    public function allDesc(): Collection
    {
        return $this->all()->sortByDesc('created_at');
    }
}
