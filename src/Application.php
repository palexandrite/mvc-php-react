<?php

namespace Src;

class Application
{
    public $_config;

    public function __construct($config)
    {
        $this->_config = $config;
    }
    
    public function run()
    {
        try {
            $route = (new Router)->parseURL();
            $controller = $route[0];
            $action = $route[1];
            
            session_start();
            
            if (!method_exists($controller, $action)) {
                Router::ErrorPage404();
            }
            
            $result = (new $controller($this->_config))->$action();
                
            View::renderText($result);
            
            session_write_close();
            
        } catch (Exception $ex) {

        }
    }
}
