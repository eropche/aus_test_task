<?php

declare(strict_types=1);

namespace App\DTO;

final class CustomerIdDto
{
    public int $customerId;

    public function __construct(int $customerId)
    {
        $this->customerId = $customerId;
    }
}
