<?php

declare(strict_types=1);

namespace App\Handler;

use App\DTO\GetAllCustomersResponse;
use App\Repository\CustomerRepository;

final class GetAllCustomersHandler
{
    private CustomerRepository $repository;

    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(): GetAllCustomersResponse
    {
        return new GetAllCustomersResponse($this->repository->findAll());
    }
}
