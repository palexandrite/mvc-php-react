<?php

class Controller
{
    public function getName()
    {
        return get_called_class();
    }
}