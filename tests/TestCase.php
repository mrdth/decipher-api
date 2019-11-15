<?php


namespace MrDth\DecipherApi\Test;


use MrDth\DecipherApi\DecipherFacade;
use MrDth\DecipherApi\DecipherServiceProvider;

use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    /**
     * Load package service provider
     * @param  \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [DecipherServiceProvider::class];
    }

    /**
     * Load package alias
     * @param  \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'Decipher' => DecipherFacade::class,
        ];
    }
}