<?php

namespace MrDth\DecipherApi\Factories\Api;

use MrDth\DecipherApi\Factories\Client;

class SurveyData
{
    private $client;
    private $survey_id;
    private $server_directory;
    private $condition;

    /**
     * Inject HTTP Client
     */
    public function __construct(Client $client, $server_directory, $survey_id)
    {
        $this->client = $client;
        $this->survey_id = $survey_id;
        $this->server_directory = $server_directory;
    }

    public function setCondition($condition)
    {
        $this->condition = $condition;
        return $this;
    }

    public function get(array $fields, string $return_format)
    {
        $endpoint = $this->buildEndpoint($fields, $return_format);

        // As URLs have a max length, if the endpoint is large, defer to a POST instead
        if (strlen($endpoint) > 800) {
            return $this->post($fields, $return_format);
        }

        $response = $this->client->get($endpoint);

        return (string) $response->getBody();
    }

    public function post(array $fields, string $return_format)
    {
        $data = [
            'json' => [
                'survey' => "$this->server_directory/$this->survey_id",
                'fields' => $fields,
                'format' => $return_format
            ]
        ];

        if (isset($this->condition)) {
            $data['json']['cond'] = $this->condition;
        }

        $response = $this->client->post("surveys/survey/data", $data);

        return (string) $response->getBody();
    }

    protected function buildEndpoint($fields, $format)
    {
        $endpoint = "surveys/$this->server_directory/$this->survey_id/data?format=$format";

        if (count($fields)) {
            $endpoint .= '&fields=' . implode(',', $fields);
        }

        if (isset($this->condition)) {
            $endpoint .= '&cond=' . urlencode($this->condition);
        }

        return $endpoint;
    }


}