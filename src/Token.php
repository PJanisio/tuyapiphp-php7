<?php


class Token
{
    
   
    public function __construct(array $_config)
    {
        
   
    $_token = '';
    $_endpoints =
        [
            'get_new' => '/v1.0/token?grant_type=1',
            'get_refresh' => '/v1.0/token/{refresh_token}',
        ];
        
        $this->_config = $_config;
        $this->_endpoints = $_endpoints;

    }

    public function __call($name, $args = [])
    {
        $request = new Caller($this->_config, $this->_endpoints, $this->_token);

        return $request->send($name, $args);
    }
}
