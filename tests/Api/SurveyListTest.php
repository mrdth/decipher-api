<?php

/**
 * Test cases for MrDth\DecipherApi\Api\SurveyList
 *
 * @tags
 * @phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
 */

namespace MrDth\DecipherApi\Test\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use MrDth\DecipherApi\Decipher;
use MrDth\DecipherApi\Factories\Api\SurveyList;
use MrDth\DecipherApi\Test\TestCase;

class SurveyListTest extends TestCase
{
    protected $client;
    protected $decipher;

    public function setUp()
    {
        parent::setUp();

        $mock = new MockHandler();
        $handler = HandlerStack::create($mock);
        $this->client = new Client(['handler' => $handler]);

        $this->decipher = new Decipher($this->client);
    }

    /** @test */
    public function it_can_be_instantiated_with_valid_client()
    {
        $this->assertInstanceOf(SurveyList::class, new SurveyList($this->client));
    }

}
