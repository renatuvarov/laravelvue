<?php

namespace App\Models\Orders;

class OrderDto
{
    private Name $name;
    private Phone $phone;
    private Message $message;

    private function __construct(Name $name, Phone $phone, Message $message)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->message = $message;
    }

    public static function create(array $payload): self
    {
        return new self(
            Name::create($payload['name']),
            Phone::create($payload['phone']),
            Message::create($payload['message']),
        );
    }

    public function getName(): string
    {
        return $this->name->getValue();
    }

    public function getPhone(): string
    {
        return $this->phone->getValue();
    }

    public function getMessage(): string
    {
        return $this->message->getValue();
    }
}
