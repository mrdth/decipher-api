<?php

namespace MrDth\DecipherApi\Factories;

use GuzzleHttp\Client as HttpClient;
use MrDth\DecipherApi\Exceptions\MissingApiKeyException;
use MrDth\DecipherApi\Exceptions\MissingUriException;

class Client
{
    public function __construct($base_uri, $api_key)
    {
        $this->checkCredentials($base_uri, $api_key);

        $this->client = new HttpClient([
            'base_uri' => $base_uri,
            'headers' => [
                'x-apikey' => $api_key
            ],
        ]);
    }

    private function checkCredentials($uri, $key)
    {
        if ($uri === null || $uri === '') {
            throw new MissingUriException();
        }

        if ($key === null || $key === '') {
            throw new MissingApiKeyException();
        }
    }
}