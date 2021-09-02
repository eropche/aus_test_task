<?php

declare(strict_types=1);

namespace App\Http\Controller;

use App\DTO\CustomerIdDto;
use App\Handler\GetAllCustomersHandler;
use App\Handler\GetCustomerHandler;
use App\Http\ApiResponse;

final class CustomerController
{
    public function getAll(GetAllCustomersHandler $handler): ApiResponse
    {
        return new ApiResponse($handler->handle()->getData());
    }

    public function getById(CustomerIdDto $customerIdDto, GetCustomerHandler $handler): ApiResponse
    {
        return new ApiResponse($handler->handle($customerIdDto));
    }
}
