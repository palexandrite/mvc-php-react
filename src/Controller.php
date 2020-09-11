<?php

namespace Src;

class Controller
{    
    public function __toString()
    {
        return get_called_class();
    }
    
    private function getView()
    {
        return new View;
    }

    public function render($view, $params = [])
    {
        $content = $this->getView()->renderWithLayout($view, $params, $this);
        return $content;
    }
}