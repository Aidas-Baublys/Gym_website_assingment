<?php

namespace App\Views;

use App\App;
use Core\View;

class Navigation extends View
{
    public function __construct()
    {
        parent::__construct($this->generate());
    }

    public function generate()
    {
        $this->addLink('Sporto Namai', App::$router::getUrl('index'), 'left');
        $this->addLink('Komentarai', App::$router::getUrl('feedback'), 'left');

        if (App::$session->getUser()) {
            $name = App::$session->getUser()['name'];
            $this->addLink("Atjungti ([{{$name}}]) iš kojos", App::$router::getUrl('logout'), 'right');
        } else {
            $this->addLink('Registruok Savo Lašinius', App::$router::getUrl('register'), 'right');
            $this->addLink('Prijunk Savo Lašinius', App::$router::getUrl('login'), 'right');
        }

        return $this->data;
    }

    public function addLink($title, $url, $section)
    {
        $link = [
            'title' => $title,
            'url' => $url,
        ];

        if ($_SERVER['REQUEST_URI'] === $link['url']) {
            $link['active'] = true;
        } else {
            $link['active'] = false;
        }

        $this->data[$section][] = $link;
    }

    public function render($template_path = ROOT . '/app/templates/nav.php')
    {
        return parent::render($template_path);
    }
}


