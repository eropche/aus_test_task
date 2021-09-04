<?php

declare(strict_types=1);

namespace App\Handler;

use App\DTO\CustomerIdDto;
use App\DTO\GetCustomerResponse;
use App\Repository\CustomerRepository;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

final class GetCustomerHandler
{
    private CustomerRepository $repository;

    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(CustomerIdDto $customerIdDto): GetCustomerResponse
    {
        $customer = $this->repository->find($customerIdDto->customerId);
        if (!$customer) {
            throw new ResourceNotFoundException('Customer not found.');
        }

        return new GetCustomerResponse($customer);
    }
}
