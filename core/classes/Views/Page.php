<?php

namespace Core\Views;

use Core\View;

/**
 * Class Page renders page template
 *
 * @package Core\Views
 */
class Page extends View
{
    public function render($template_path = ROOT . '/core/templates/page.tpl.php')
    {
        return parent::render($template_path);
    }
}