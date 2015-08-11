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

class Client extends \SoapClient 
{
    /**
     * Instance var. The Merchant ID API credential.
     * 
     * @access private
     * @var string
     */
    private $_merchantID;

    /**
     * Instance var. The Transaction Key API credential.
     * 
     * @access private
     * @var string
     */
    private $_transactionKey;

    /**
     * Instance var. Run mode. live|test
     * 
     * @access private
     * @var string
     */
    private $_mode;

    /**
     * Instance var. WSDL
     * 
     * @access private
     * @var string
     */
    private $_WSDL;

    /**
     * Class var. Constant for live mode.
     * 
     * @access public
     * @var string
     */
    const MODE_LIVE = 'live';

    /**
     * Class var. Constant for test mode.
     * 
     * @access public
     * @var string
     */
    const MODE_TEST = 'test';

    /**
     * Class var. live WSDL URL.
     * 
     * @access public
     * @var string
     */
    const WSDL_LIVE = 'https://ics2.ic3.com/commerce/1.x/transactionProcessor/CyberSourceTransaction_1.109.wsdl';

    /**
     * Class var. Test WSDL URL.
     * 
     * @access public
     * @var string
     */
    const WSDL_TEST = 'https://ics2wstest.ic3.com/commerce/1.x/transactionProcessor/CyberSourceTransaction_1.109.wsdl';

    /**
     * Class var. API namespace.
     * 
     * @access public
     * @var string
     */
    const API_NAMESPACE = 'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd';

    /**
     * Constructor.
     *
     * @access public
     * @param string    $merchandID
     * @param string    $transactionKey
     * @param string    $mode
     * @param array     $options
     * @return \CyberSourceSOAPAPI\Client
     */
    public function __construct($merchandID, 
                                $transactionKey,
                                $mode, 
                                array $options = array())
    {
        $this->_merchantID      = $merchandID;
        $this->_transactionKey  = $transactionKey;

        switch ($mode){

            case self::MODE_LIVE:
                break;
                $this->_mode = self::MODE_LIVE;
                $this->_WSDL = self::WSDL_LIVE;

            case self::MODE_TEST:
            default:
                $this->_mode = self::MODE_TEST;
                $this->_WSDL = self::WSDL_TEST;
                break;

        }

        parent::__construct($this->_WSDL, $options);

        $soapUsername = new \SoapVar(
            $this->_merchantID,
            XSD_STRING,
            NULL,
            SELF::API_NAMESPACE,
            NULL,
            SELF::API_NAMESPACE
        );

        $soapPassword = new \SoapVar(
            $this->_transactionKey,
            XSD_STRING,
            NULL,
            SELF::API_NAMESPACE,
            NULL,
            SELF::API_NAMESPACE
        );

        $auth = new \stdClass();
        $auth->Username = $soapUsername;
        $auth->Password = $soapPassword; 

        $soapAuth = new \SoapVar(
            $auth,
            SOAP_ENC_OBJECT,
            NULL, SELF::API_NAMESPACE,
            'UsernameToken',
            SELF::API_NAMESPACE
        ); 

        $token = new \stdClass();
        $token->UsernameToken = $soapAuth; 

        $soapToken = new \SoapVar(
            $token,
            SOAP_ENC_OBJECT,
            NULL,
            SELF::API_NAMESPACE,
            'UsernameToken',
            SELF::API_NAMESPACE
        );

        $security =new \SoapVar(
            $soapToken,
            SOAP_ENC_OBJECT,
            NULL,
            SELF::API_NAMESPACE,
            'Security',
            SELF::API_NAMESPACE
        );

        $header = new \SoapHeader(SELF::API_NAMESPACE, 'Security', $security, true); 

        $this->__setSoapHeaders(array($header)); 
    }

    /**
     * Getter for @link \CyberSourceSOAPAPI\Client::$_merchantID.
     *
     * @access public
     * @return string
     */
    public function getMerchantID()
    {
        return $this->_merchantID;
    }
}