<?php

namespace App\ApiClient;

use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\HttpExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiClient
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }


    public function getRequest(string $url, string $token = '')
    {
        try {
            $response = $this->client->request(
                'GET',
                $url,
                [
                    'headers' => [
                        'Authorization' => $token ? 'token '.$token : null,
                    ]
                ],
            );
            return $response->toArray();
        } catch(HttpExceptionInterface | DecodingExceptionInterface | TransportExceptionInterface $e) {
            echo $e->getMessage();
            return false;
        }
    }


}