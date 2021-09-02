<?php

declare(strict_types=1);

namespace App\DTO;

use App\Entity\Customer;

final class GetCustomerResponse
{
    /**
     * @var array<int,array>
     */
    private array $data;

    public function __construct(Customer $customer)
    {
        $this->data = [
            'id' => $customer->getId(),
            'fullName' => sprintf('%s %s', $customer->getFirstName(), $customer->getLastName()),
            'email' => $customer->getEmail(),
            'country' => $customer->getCountry(),
            'username' => $customer->getUsername(),
            'gender' => $customer->getGender()->getValue(),
            'city' => $customer->getCity(),
            'phone' => $customer->getPhone(),
        ];
    }

    /**
     * @return array<int,array>
     */
    public function getData(): array
    {
        return $this->data;
    }
}
