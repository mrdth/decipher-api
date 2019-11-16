<?php

namespace MrDth\DecipherApi;

use GuzzleHttp\ClientInterface;

class Decipher
{
    protected $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }
}