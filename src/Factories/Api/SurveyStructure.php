<?php

namespace MrDth\DecipherApi\Factories\Api;

use GuzzleHttp\ClientInterface;

class SurveyStructure
{
    private $client;
    private $survey_id;
    private $server_directory;

    /**
     * Inject HTTP Client
     */
    public function __construct(ClientInterface $client, $server_directory, $survey_id)
    {
        $this->client = $client;
        $this->survey_id = $survey_id;
        $this->server_directory = $server_directory;
    }

    public function fetch(string $return_format)
    {
        $response = $this->client->get($this->buildEndpoint($return_format));

        return $response->getBody();
    }

    protected function buildEndpoint($format)
    {
        return "surveys/$this->server_directory/$this->survey_id/datamap?format=$format";
    }
}