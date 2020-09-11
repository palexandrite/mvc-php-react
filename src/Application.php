<?php

namespace Src;

class Application
{    
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
            
            $result = (new $controller)->$action();
                
            View::renderText($result);
            
            session_write_close();
            
        } catch (Exception $ex) {

        }
    }
}
