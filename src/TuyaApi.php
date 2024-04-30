<?php

/**
 * PHP TUYA API HOME MANAGEMENT CLIENT
 * PHP version 5.3+.
 *
 * @category 	Library
 *
 * @version	1.0.0
 *
 * @author   	Irony <irony00100@gmail.com>
 */


class TuyaApi
{

    protected $_required = ['accessKey', 'secretKey', 'baseUrl'];

    public function __construct($config)
    {
        $this->_checkConfig($config);
        //$this->_config = arr(ay_merge($this->_config, $config);
        $this->_config = array();
        $this->_config = $config;
    }

    public function devices($token)
    {
        return new Devices($this->_config, $token);
    }

    public function token()
    {

        return new Token($this->_config);
        

    }

    public function __get($name)
    {
        return $this->$name();
    }

    public function _checkConfig($config)
    {
        try {
            if (count(array_intersect_key(array_flip($this->_required),
                $config)) !== count($this->_required)) {
                $msg = 'Please set "accessKey", "secretKey" and "baseUrl", aborting!';
                throw new \Exception($msg);
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }
}
