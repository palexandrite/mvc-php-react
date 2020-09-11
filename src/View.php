<?php

namespace Src;

class View
{
    public $layout = 'main';
    
    /**
     * A view file is rendered with a layout file
     * @param string $view
     * @param array $params
     * @param object $object
     * @return string
     */
    public function renderWithLayout($view, $params = [], $object)
    {
        $content = $this->renderFile($view, $params, $object);
        return $this->renderFile($GLOBALS['config']['viewPath'] .'layouts/'. $this->layout, ['content' => $content]);
    }
    
    /**
     * Veriables are included into a view file
     * @param string $view
     * @param array $params
     * @param object $object
     * @return string
     * @throws \Exception
     */
    public function renderFile($view, $params = [], $object = null) : string
    {
        $_obInitialLevel_ = ob_get_level();
        ob_start();
        ob_implicit_flush(false);
        extract($params, EXTR_OVERWRITE);
        try {
            if (is_null($object)) {
                require_once $view .'.php';
            } else {
                $controller = lcfirst(preg_replace('#Controller#', '', (new \ReflectionClass($object))->getShortName()));
                require_once $GLOBALS['config']['viewPath'] . $controller .'/'. $view . '.php';
            }
            return ob_get_clean();
        } catch (\Exception $e) {
            while (ob_get_level() > $_obInitialLevel_) {
                if (!@ob_end_clean()) {
                    ob_clean();
                }
            }
            throw $e;
        } catch (\Throwable $e) {
            while (ob_get_level() > $_obInitialLevel_) {
                if (!@ob_end_clean()) {
                    ob_clean();
                }
            }
            throw $e;
        }
    }
    
    /**
     * Simple renders a string
     * @param string $print
     * @throws Exception
     */
    public static function renderText($print)
    {
        if (is_string($print)) {
            echo $print;
        } else {
            throw \Exception('A rendering item must be a string type.');
        }
    }
}
