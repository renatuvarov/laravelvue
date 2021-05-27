<?php

namespace App\Models\Orders;

use Webmozart\Assert\Assert;

class Message
{
    private string $message;

    private function __construct(string $message)
    {
        $this->message = $message;
    }

    public static function create(string $message): self
    {
        Assert::stringNotEmpty($message);

        return new self($message);
    }

    public function getValue(): string
    {
        return $this->message;
    }
}
