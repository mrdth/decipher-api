<?php

namespace MrDth\DecipherApi\Factories\Api;

use MrDth\DecipherApi\Factories\Client;

class SurveyList
{
    /**
     * Client object
     *
     * @var Client
     */
    protected $client;

    /**
     * Inject API Client
     *
     * @param $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function fetch()
    {
        $response = $this->client->get('/rh/companies/all/surveys');

        return json_decode($response->getBody());
    }
}