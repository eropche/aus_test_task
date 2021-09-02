<?php

declare(strict_types=1);

namespace App\Handler;

use App\DTO\CustomerIdDto;
use App\DTO\GetCustomerResponse;
use App\Repository\CustomerRepository;

final class GetCustomerHandler
{
    private CustomerRepository $repository;

    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(CustomerIdDto $customerIdDto): GetCustomerResponse
    {
        return new GetCustomerResponse($this->repository->find($customerIdDto->customerId));
    }
}
