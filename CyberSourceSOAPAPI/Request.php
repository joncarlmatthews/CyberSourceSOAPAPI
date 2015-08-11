<?php

/**
 * CyberSourceSOAPAPI Client
 *
 * @link      https://github.com/joncarlmatthews/CyberSourceSOAPAPI for the canonical source repository
 * @license   GNU General Public License
 *
 * File format: UNIX
 * File encoding: UTF8
 * File indentation: Spaces (4). No tabs
 */

namespace CyberSourceSOAPAPI;

class Request 
{
    /**
     * Instance property. The request's reference code.
     * 
     * @access public
     * @var public
     */
    public $merchantReferenceCode = null;

    /**
     * Instance property. The merchant ID.
     * 
     * @access public
     * @var public
     */
    public $merchantID = null;

    /**
     * Instance property. The request's client library meta.
     * 
     * @access public
     * @var public
     */
    public $clientLibrary = 'https://github.com/joncarlmatthews/CyberSourceSOAPAPI';

    /**
     * Instance property. The request's client library version meta.
     * 
     * @access public
     * @var public
     */
    public $clientLibraryVersion = null;

    /**
     * Instance property. The request's client environment meta.
     * 
     * @access public
     * @var public
     */
    public $clientEnvironment = null;

    /**
     * Constructor. Creates an instance for passing to the client object.
     *
     * @access public
     * @param \CyberSourceSOAPAPI\Client        $client                 The client object
     * @param string                            $merchantReferenceCode  Merchant reference code.
     * @return \CyberSourceSOAPAPI\Request
     */
    public function __construct(\CyberSourceSOAPAPI\Client $client,
                                    $merchantReferenceCode)
    {
        $this->merchantReferenceCode   = $merchantReferenceCode;
        $this->merchantID              = $client->getMerchantID();
        $this->clientLibraryVersion    = phpversion();
        $this->clientEnvironment       = php_uname();

    }
}