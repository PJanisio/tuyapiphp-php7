<?php



class Caller
{
    protected $_payload = [];

    protected $_sigHeaders = [];

    public function __construct(array $_config, array $_endpoints, $_token = null)
    {
        
        $this->_endpoints = $_endpoints;
        $this->_config = $_config;
        $this->_token = $_token;
        $this->_payload = $_payload;
        $this->_sigHeaders = $_sigHeaders;
    }

    public function send($name, $args = [])
    {
        if (!array_key_exists($name, $this->_endpoints)) {
            try {
                throw new \Exception('Method "'.$name.'" is not supported!');
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
            exit;
        }
        $uri = $this->_endpoints[$name];
        preg_match('/put_|get_|post_|delete_/', (string) $name, $matches);
        $request = str_replace('_', '', $matches[0]);
        foreach ($args as $arg) {
            if (is_array($arg)) {
                if (empty($this->_payload)) {
                    $this->_payload = $arg;
                } else {
                    $this->_sigHeaders = $arg;
                }
            } else {
                $uri = preg_replace('/\{.*?\}/', (string) $arg, (string) $uri, 1);
            }
        }
        $request = new Request($this->_config, $uri, $request,
            $this->_token,
            $this->_payload,
            $this->_sigHeaders);

        return $request->call();
    }
}
