<?php


class DebugHandler
{
    public function __construct(array $_config)

    {
        $this->_config = $_config;
    }

    public function output($msg, $data = null)
    {
        if (@$this->_config['debug'] != true) {
            return;
        }
        if ($data) {
            echo $msg;
            echo '<pre>'.print_r($data, true).'</pre>';

            return;
        }
        echo $msg."<br>\n";
    }
}
