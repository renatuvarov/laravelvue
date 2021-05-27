<?php

namespace App\Repositories;

use App\Models\Orders\OrderDto;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class FileRepository extends AbstractRepository
{
    public function all(): Collection
    {
        return collect(json_decode(Storage::disk('public')->get('orders.json'), true));
    }

    public function save(OrderDto $dto): void
    {
        $orders = $this->all();
        $orders->add($this->factory->makeArrayModel($dto));
        Storage::disk('public')->put('orders.json', $orders->toJson());
    }

    public static function type(): string
    {
        return 'File';
    }
}
