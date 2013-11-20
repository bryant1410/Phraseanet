<?php

namespace Alchemy\Phrasea\Model\Proxies\__CG__\Alchemy\Phrasea\Model\Entities;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Session extends \Alchemy\Phrasea\Model\Entities\Session implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', 'id', 'usr_id', 'user_agent', 'ip_address', 'platform', 'browser_name', 'browser_version', 'screen_width', 'screen_height', 'token', 'nonce', 'created', 'updated', 'modules');
        }

        return array('__isInitialized__', 'id', 'usr_id', 'user_agent', 'ip_address', 'platform', 'browser_name', 'browser_version', 'screen_width', 'screen_height', 'token', 'nonce', 'created', 'updated', 'modules');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Session $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setUser(\User_Adapter $user)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUser', array($user));

        return parent::setUser($user);
    }

    /**
     * {@inheritDoc}
     */
    public function setUsrId($usrId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUsrId', array($usrId));

        return parent::setUsrId($usrId);
    }

    /**
     * {@inheritDoc}
     */
    public function getUser(\Alchemy\Phrasea\Application $app)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUser', array($app));

        return parent::getUser($app);
    }

    /**
     * {@inheritDoc}
     */
    public function getUsrId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUsrId', array());

        return parent::getUsrId();
    }

    /**
     * {@inheritDoc}
     */
    public function setUserAgent($userAgent)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUserAgent', array($userAgent));

        return parent::setUserAgent($userAgent);
    }

    /**
     * {@inheritDoc}
     */
    public function getUserAgent()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUserAgent', array());

        return parent::getUserAgent();
    }

    /**
     * {@inheritDoc}
     */
    public function setIpAddress($ipAddress)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIpAddress', array($ipAddress));

        return parent::setIpAddress($ipAddress);
    }

    /**
     * {@inheritDoc}
     */
    public function getIpAddress()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIpAddress', array());

        return parent::getIpAddress();
    }

    /**
     * {@inheritDoc}
     */
    public function setPlatform($platform)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPlatform', array($platform));

        return parent::setPlatform($platform);
    }

    /**
     * {@inheritDoc}
     */
    public function getPlatform()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPlatform', array());

        return parent::getPlatform();
    }

    /**
     * {@inheritDoc}
     */
    public function setBrowserName($browserName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBrowserName', array($browserName));

        return parent::setBrowserName($browserName);
    }

    /**
     * {@inheritDoc}
     */
    public function getBrowserName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBrowserName', array());

        return parent::getBrowserName();
    }

    /**
     * {@inheritDoc}
     */
    public function setBrowserVersion($browserVersion)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBrowserVersion', array($browserVersion));

        return parent::setBrowserVersion($browserVersion);
    }

    /**
     * {@inheritDoc}
     */
    public function getBrowserVersion()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBrowserVersion', array());

        return parent::getBrowserVersion();
    }

    /**
     * {@inheritDoc}
     */
    public function setScreenWidth($screenWidth)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setScreenWidth', array($screenWidth));

        return parent::setScreenWidth($screenWidth);
    }

    /**
     * {@inheritDoc}
     */
    public function getScreenWidth()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getScreenWidth', array());

        return parent::getScreenWidth();
    }

    /**
     * {@inheritDoc}
     */
    public function setScreenHeight($screenHeight)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setScreenHeight', array($screenHeight));

        return parent::setScreenHeight($screenHeight);
    }

    /**
     * {@inheritDoc}
     */
    public function getScreenHeight()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getScreenHeight', array());

        return parent::getScreenHeight();
    }

    /**
     * {@inheritDoc}
     */
    public function setToken($token)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setToken', array($token));

        return parent::setToken($token);
    }

    /**
     * {@inheritDoc}
     */
    public function getToken()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getToken', array());

        return parent::getToken();
    }

    /**
     * {@inheritDoc}
     */
    public function setNonce($nonce)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNonce', array($nonce));

        return parent::setNonce($nonce);
    }

    /**
     * {@inheritDoc}
     */
    public function getNonce()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNonce', array());

        return parent::getNonce();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreated(\DateTime $created)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreated', array($created));

        return parent::setCreated($created);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreated()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreated', array());

        return parent::getCreated();
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdated(\DateTime $updated)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdated', array($updated));

        return parent::setUpdated($updated);
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdated()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdated', array());

        return parent::getUpdated();
    }

    /**
     * {@inheritDoc}
     */
    public function addModule(\Alchemy\Phrasea\Model\Entities\SessionModule $modules)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addModule', array($modules));

        return parent::addModule($modules);
    }

    /**
     * {@inheritDoc}
     */
    public function removeModule(\Alchemy\Phrasea\Model\Entities\SessionModule $modules)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeModule', array($modules));

        return parent::removeModule($modules);
    }

    /**
     * {@inheritDoc}
     */
    public function getModules()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getModules', array());

        return parent::getModules();
    }

    /**
     * {@inheritDoc}
     */
    public function getModuleById($moduleId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getModuleById', array($moduleId));

        return parent::getModuleById($moduleId);
    }

    /**
     * {@inheritDoc}
     */
    public function hasModuleId($moduleId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'hasModuleId', array($moduleId));

        return parent::hasModuleId($moduleId);
    }

}
