<?php

namespace MrDth\DecipherApi;

use GuzzleHttp\ClientInterface;

class Decipher
{
    protected $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    public function getSurveyList(): SurveyList
    {
        return (new SurveyList($this->client))->fetch();
    }
    }
}