# CyberSourceSOAPAPI

Simple PHP library for making SOAP requests to the CyberSource API. Unlike the official library, the class API allows for the CyberSource API credentials to be supplied as paramaters rather than in a configuration file.

Usage
-------------------------
<pre><code>// Load the class files.
require 'CyberSourceSOAPAPI/Client.php';
require 'CyberSourceSOAPAPI/Request.php';

// API credentials.
$merchantID         = 'foo';
$transactionKey     = 'bar';

// Create the client object.
$client = new \CyberSourceSOAPAPI\Client($merchantID,
                                            $transactionKey,
                                            \CyberSourceSOAPAPI\Client::MODE_LIVE);

// The request's reference code.
$merchantReferenceCode = 'qux';

// Create the request object.
$request = new \CyberSourceSOAPAPI\Request($client, $merchantReferenceCode);

// Set request parameters...
$ccAuthService = new \stdClass();
$ccAuthService->run = 'true';
$request->ccAuthService = $ccAuthService;

// Make the SOAP call.
$response = $client->runTransaction($request);

// Output response.
print_r($response);

</code></pre>
