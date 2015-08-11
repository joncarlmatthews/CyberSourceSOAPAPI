# CyberSourceSOAPAPI

Simple PHP library for making SOAP requests to the CyberSource API. Unlike the official library, this class API allows for the API credentials to be supplied as paramaters rather than in a configuration file.

Usage
-------------------------
<pre><code>// Load the class files.
require 'CyberSourceSOAPAPI/Client.php';
require 'CyberSourceSOAPAPI/Request.php';

// Config.
$merchantID         = 'foo';
$transactionKey     = 'bar';

$client = new \CyberSourceSOAPAPI\Client($merchantID,
                                            $transactionKey,
                                            \CyberSourceSOAPAPI\Client::MODE_LIVE);

$merchantReferenceCode = 'qux';

$request = new \CyberSourceSOAPAPI\Request($client, $merchantReferenceCode);

// Your request parameters.
$ccAuthService = new \stdClass();
$ccAuthService->run = 'true';
$request->ccAuthService = $ccAuthService;

$response = $client->runTransaction($request);

// Output response.
print_r($response);

</code></pre>
