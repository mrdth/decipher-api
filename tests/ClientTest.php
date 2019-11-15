<?php

namespace MrDth\DecipherApi\Test;

use MrDth\DecipherApi\Exceptions\MissingApiKeyException;
use MrDth\DecipherApi\Exceptions\MissingUriException;
use MrDth\DecipherApi\Factories\Client;

class ClientTest extends TestCase
{

    /** @test */
    public function uri_cannot_be_null()
    {
        $this->expectException(MissingUriException::class);
        new Client(null, 'fakeapikey');
    }

    /** @test */
    public function uri_cannot_be_empty_string()
    {
        $this->expectException(MissingUriException::class);
        new Client('', 'fakeapikey');
    }

    /** @test */
    public function api_key_cannot_be_null()
    {
        $this->expectException(MissingApiKeyException::class);
        new Client('https://api.cintworks.net', null);
    }

    /** @test */
    public function api_key_cannot_be_empty_string()
    {
        $this->expectException(MissingApiKeyException::class);
        new Client('https://api.cintworks.net', '');
    }

    /** @test */
    public function it_can_be_instantiated_with_valid_details()
    {
        $this->assertInstanceOf(
            Client::class,
            new Client('https://api.cintworks.net', 'thisisafakekey')
        );
    }
}
