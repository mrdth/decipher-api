<?php

namespace MrDth\DecipherApi\Factories\Api;

use GuzzleHttp\ClientInterface;

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
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function fetch()
    {
        $response = $this->client->get('/rh/companies/all/surveys');

        return json_decode($response->getBody());
    }
}