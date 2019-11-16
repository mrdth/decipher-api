<?php

/**
 * Test cases for MrDth\DecipherApi\Decipher
 *
 * @tags
 * @phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
 */

namespace MrDth\DecipherApi\Test;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use MrDth\DecipherApi\Decipher;

class DecipherTest extends TestCase
{
    protected $client;
    protected $cint;

    public function setUp()
    {
        parent::setUp();

        $mock = new MockHandler();
        $handler = HandlerStack::create($mock);
        $this->client = new Client(['handler' => $handler]);

        $this->cint = new Decipher($this->client);
    }

    /** @test */
    public function it_can_be_instantiated_with_valid_client()
    {
        $this->assertInstanceOf(Decipher::class, new Decipher($this->client));
    }
}
