<?php

namespace Core;


/**
 * Class View helps reuse templates multiple times across all pages
 *
 * @package Core
 */
class View
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Renders HTML elements from templates
     *
     * @param $template_path
     * @return false|string
     * @throws \Exception
     */
    public function render($template_path)
    {
        if (!file_exists($template_path)) {
            throw new \Exception("$template_path template does not exits");
        }

        $data = $this->data;

        ob_start();

        require $template_path;

        return ob_get_clean();
    }
}