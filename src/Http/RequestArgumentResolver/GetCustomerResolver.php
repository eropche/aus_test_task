<?php

declare(strict_types=1);

namespace App\Http\RequestArgumentResolver;

use App\DTO\CustomerIdDto;
use Generator;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;

final class GetCustomerResolver implements ArgumentValueResolverInterface
{
    public function supports(Request $request, ArgumentMetadata $argument): bool
    {
        if ($argument->getType() !== CustomerIdDto::class) {
            return false;
        }

        return true;
    }

    /**
     * @return Generator<CustomerIdDto>
     */
    public function resolve(Request $request, ArgumentMetadata $argument): Generator
    {
        $customerId = $request->get('customerId');

        if (!$customerId || !is_numeric($customerId)) {
            throw new BadRequestException('customerId is invalid');
        }

        yield new CustomerIdDto((int) $customerId);
    }
}
