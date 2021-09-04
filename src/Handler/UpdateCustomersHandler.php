<?php

declare(strict_types=1);

namespace App\Handler;

use App\Entity\Customer;
use App\Integration\RandomUserGenerator\ApiClient;
use App\Repository\CustomerRepository;
use App\VO\Country;

final class UpdateCustomersHandler
{
    public const DEFAULT_COUNT = 200;
    public const DEFAULT_NATIONALITY = 'au';

    private CustomerRepository $repository;

    private ApiClient $apiClient;

    public function __construct(CustomerRepository $repository, ApiClient $apiClient)
    {
        $this->repository = $repository;
        $this->apiClient = $apiClient;
    }

    public function handle(): void
    {
        $users = $this->apiClient->getUsers(self::DEFAULT_COUNT, self::DEFAULT_NATIONALITY);
        foreach ($users['results'] as $user) {
            $customer = new Customer();
            $customer->setUsername($user['login']['username']);
            $customer->setFirstName($user['name']['first']);
            $customer->setLastName($user['name']['last']);
            $customer->setPhone($user['phone']);
            $customer->setEmail($user['email']);
            $customer->setCity($user['location']['city']);
            $customer->setCountry(Country::$countries[$user['nat']]);
            $customer->setGender($user['gender']);

            $this->repository->save($customer);
        }
    }
}
