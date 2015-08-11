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
     * Instance property. Desc.
     * 
     * @access public
     * @var public
     */
    public $merchantReferenceCode = null;

    /**
     * Instance property. Desc.
     * 
     * @access public
     * @var public
     */
    public $merchantID = null;

    /**
     * Instance property. Desc.
     * 
     * @access public
     * @var public
     */
    public $clientLibrary = 'https://github.com/joncarlmatthews/CyberSourceSOAPAPI';

    /**
     * Instance property. Desc.
     * 
     * @access public
     * @var public
     */
    public $clientLibraryVersion = null;

    /**
     * Instance property. Desc.
     * 
     * @access public
     * @var public
     */
    public $clientEnvironment = null;

    public function __construct(\CyberSourceSOAPAPI\Client $client,
                                    $merchantReferenceCode)
    {
        $this->merchantReferenceCode   = $merchantReferenceCode;
        $this->merchantID              = $client->getMerchantID();
        $this->clientLibraryVersion    = phpversion();
        $this->clientEnvironment       = php_uname();

    }
}