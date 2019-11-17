<?php

namespace MrDth\DecipherApi;

use GuzzleHttp\ClientInterface;
use MrDth\DecipherApi\Factories\Api\SurveyData;
use MrDth\DecipherApi\Factories\Api\SurveyList;
use MrDth\DecipherApi\Factories\Api\SurveyStructure;

class Decipher
{
    protected $client;
    protected $default_fields;
    protected $server_directory;
    protected $survey_id;

    /**
     * @param string $server_directory
     */
    public function setServerDirectory(string $server_directory): void
    {
        $this->server_directory = $server_directory;
    }

    /**
     * @param int $survey_id
     */
    public function setSurveyId(int $survey_id): void
    {
        $this->survey_id = $survey_id;
    }

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;

        // Set the default fields to be fetched with every survey data request.
        $this->default_fields = [
            'uuid',
            'status'
        ];
    }

    public function getSurveyList(): SurveyList
    {
        return (new SurveyList($this->client))->fetch();
    }

    public function getSurveyData(array $fields, string $return_format)
    {
        $client = new SurveyData($this->client, $this->server_directory, $this->survey_id);

        return $client->fetch($this->prepareFields($fields), $return_format);
    }

    public function getSurveyStructure($format = 'json')
    {
        $client = new SurveyStructure($this->client, $this->server_directory, $this->survey_id);

        return $client->fetch($format);
    }

    protected function prepareFields(array $fields)
    {
        if ($fields === ['all']) {
            $fields = [];
        }

        if (count($fields)) {
            $fields = array_unique(array_merge($this->default_fields, $fields));
        }

        return $fields;
    }
}