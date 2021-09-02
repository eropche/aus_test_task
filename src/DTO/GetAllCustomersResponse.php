<?php

declare(strict_types=1);

namespace App\DTO;

use App\Entity\Customer;

final class GetAllCustomersResponse
{
    /**
     * @var array<int,array>
     */
    private array $data = [];

    /**
     * @param array<Customer> $customers
     */
    public function __construct(array $customers)
    {
        foreach ($customers as $customer) {
            $this->data[] = [
                'id' => $customer->getId(),
                'fullName' => sprintf('%s %s', $customer->getFirstName(), $customer->getLastName()),
                'email' => $customer->getEmail(),
                'country' => $customer->getCountry(),
            ];
        }
    }

    /**
     * @return array<int,array>
     */
    public function getData(): array
    {
        return $this->data;
    }
}
