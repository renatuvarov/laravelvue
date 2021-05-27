<?php

namespace App\Models\Orders;

use Webmozart\Assert\Assert;

class Phone
{
    private string $phone;

    private function __construct(string $phone)
    {
        $this->phone = $phone;
    }

    public static function create(string $phone): self
    {
        Assert::stringNotEmpty($phone);

        return new self($phone);
    }

    public function getValue(): string
    {
        return $this->phone;
    }
}
