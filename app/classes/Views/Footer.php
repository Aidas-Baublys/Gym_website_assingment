<?php

namespace App\Views;

use App\App;
use Core\View;

/**
 * Class Footer helps reuse Footer template on all pages
 *
 * @package App\Views
 */
class Footer extends View
{
    public function __construct()
    {
        parent::__construct($this->generate());
    }

    /**
     * Generates Footer text with dynamic date
     *
     * @return string
     */
    public function generate()
    {
        $current_date = date('Y');
        return "Copyright © $current_date Aidas Baublys, all rights reserved.";
    }

    /**
     * Renders Footer template
     *
     * @param string $template_path
     * @return false|string
     * @throws \Exception
     */
    public function render($template_path = ROOT . '/app/templates/footer.php')
    {
        return parent::render($template_path);
    }
}


