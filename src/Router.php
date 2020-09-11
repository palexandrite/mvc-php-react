<?php

namespace Src;

use Exception;

class Router
{
    private $_routes = '';
    private $indexPage = ['App\\Controllers\\SiteController', 'actionIndex'];

    /**
     * The main method for parsing an url
     * @return array
     */
    public function parseURL() : array
    {
        if ($GLOBALS['config']['useUrlParsing']) {
            
            /**
             * @todo Create a parsing of url when the index is switched off
             */
            $this->_routes = '';
        } else {
            try {
                $this->_routes = $this->parseParams();
                
                if (!$this->_routes) return $this->indexPage;
                
                $path = explode('/', $this->_routes['r']);
                $controller = 'App\\Controllers\\'.ucfirst($path[0]) . 'Controller';
                $action = 'action'. ucfirst($path[1]);
                return [$controller, $action];
            } catch (Exception $ex) {
                
            }
        }
    }
    
    /**
     * The params is gotton here
     * @return array
     */
    private function parseParams() : array
    {
        $querySting = (parse_url($_SERVER['QUERY_STRING']))['path'];
        parse_str($querySting, $params);
        return $params;
    }
    
    /**
     * The temperory method for redirecting to the 404 page
     */
    public static function ErrorPage404()
    {
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location: '.$_SERVER['HTTP_HOST'].'404');
    }
}
