<?php

namespace MrDth\DecipherApi\Factories\Api;

use GuzzleHttp\ClientInterface;

class SurveyData
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

    public function fetch(array $fields, string $return_format)
    {
        $response = $this->client->get($this->buildEndpoint($fields, $return_format));

        return $response->getBody();
    }

    protected function buildEndpoint($fields, $format)
    {
        $endpoint = "surveys/$this->server_directory/$this->survey_id/data?format=$format";

        if (count($fields)) {
            $endpoint .= '?fields=' . implode(',', $fields);
        }

        return $endpoint;
    }
}