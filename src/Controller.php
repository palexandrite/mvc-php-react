<?php

namespace Src;

class Controller
{
    public $_config;
    
    public function __construct($config)
    {
        $this->_config = $config;
    }
    
    public function __toString()
    {
        return get_called_class();
    }
    
    private function getView()
    {
        return new View($this->_config);
    }

    public function render($view, $params = [])
    {
        $content = $this->getView()->renderWithLayout($view, $params, $this);
        return $content;
    }
}