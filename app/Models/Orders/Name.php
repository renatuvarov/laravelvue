<?php

namespace App\Models\Orders;

use Webmozart\Assert\Assert;

class Name
{
    private string $name;

    private function __construct(string $name)
    {
        $this->name = $name;
    }

    public static function create(string $name): self
    {
        Assert::stringNotEmpty($name);

        return new self($name);
    }

    public function getValue(): string
    {
        return $this->name;
    }
}
