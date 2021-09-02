<?php

declare(strict_types=1);

namespace App\Integration\RandomUserGenerator;

use Exception;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class ApiClient
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $randomUsersApiClient)
    {
        $this->client = $randomUsersApiClient;
    }

    public function getUsers(int $count, string $nationality): array
    {
        $response = $this->client->request('GET', '/api', [
            'query' => [
                'nat' => $nationality,
                'results' => $count,
            ],
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new Exception('Connection error');
        }

        $data = $response->toArray(false);
        if (empty($data)) {
            throw new Exception('Empty result');
        }

        return $data;
    }
}
