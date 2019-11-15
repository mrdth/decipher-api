#Decipher API

This package provides a PHP wrapper for the FocusVision Decipher API, along with binding for using it in Laravel applications.

#### Installation
Install with composer


#### Usage

##### In Laravel

Add two new env vars:

- DECIPHER_API_KEY - API key for the application
- DECIPHER_SERVER_DIRECTORY - Directory where your projects are stored on the decipher server

The package will be auto-registered, and can be accessed via it's facade.

##### As a standalone PHP Package

```php
use GuzzleHttp\Client;
use MrDth\DecipherApi\Decipher;

$api_key = 'OBVIOUSLYFAKEAPIKEY';
$directory = 'selfserve/99d';
$survey_id = '12345';

$client = new Client();
$decipher = new Decipher($client, $api_key);
$decipher->setServerDirectory($directory)->setSurvey($survey_id);


```


All calls to the API via the wrapper should be carried out inside a try - catch block;
The wrapper does not deal with any Exceptions thrown by the underlying Guzzle client.

```php
try {
    $survey = $decipher->getDataMap();
  
    // Do whatever with $survey object
} catch (\GuzzleHttp\Exception\RequestException $e) {
    echo 'Error making request, server responded: ' . $e->getCode();
}
```

#### Methods exposed via the wrapper

