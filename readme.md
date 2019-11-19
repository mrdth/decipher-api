#Decipher API

This package provides a PHP wrapper for the FocusVision Decipher API, along with binding for using it in Laravel applications.

#### Installation
Install with composer


#### Usage

##### In Laravel

Add two new env vars:

- DECIPHER_API_URI_BASE - base URI for the decipher api (E.g. https://v2.decipherinc.com/api/v1/)
- DECIPHER_API_KEY - API key for the application

The package will be auto-registered, and can be accessed via it's facade.

##### As a standalone PHP Package

```php
use GuzzleHttp\Client;
use MrDth\DecipherApi\Decipher;

$api_uri = 'https://v2.decipherinc.com/api/v1/';
$api_key = 'OBVIOUSLYFAKEAPIKEY';
$directory = 'selfserve/99d';
$survey_id = '12345';

$client = new Client();
$decipher = new Decipher($client, $api_uri, $api_key);


```


All calls to the API via the wrapper should be carried out inside a try - catch block;
The wrapper does not deal with any Exceptions thrown by the underlying Guzzle client.

```php
$decipher->setServerDirectory($directory)->setSurvey($survey_id);

try {
    $survey_structure = $decipher->getDataMap('json');
  
    // Do whatever with $survey object
} catch (\GuzzleHttp\Exception\RequestException $e) {
    echo 'Error making request, server responded: ' . $e->getCode();
}
```

#### Methods exposed via the wrapper

