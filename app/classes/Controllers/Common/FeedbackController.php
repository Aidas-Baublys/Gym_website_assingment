<?php

namespace App\Controllers\Common;

use App\App;
use App\Views\BasePage;
use App\Views\Forms\FeedbackCreateForm;
use App\Views\Tables\FeedbackTable;
use Core\View;
use Core\Views\Link;

class FeedbackController
{
    protected $page;

    public function __construct()
    {
        $this->page = new BasePage([
            'title' => 'Pisporto klubas',
            'js' => ['/media/js/feedback/feedback.js']
        ]);
    }

    public function index(): ?string
    {
        $table = new FeedbackTable();

        if (App::$session->getUser()) {
            $feedbackForm = (new FeedbackCreateForm())->render();
        } else {
            $link = new Link([
                'text' => 'Nori komentuot? Prisijunk!',
                'url' => App::$router::getUrl('register'),
            ]);

            $feedbackForm = $link->render();
        }

        $content = (new View([
            'title' => 'Komentarai',
            'form' => $feedbackForm ?? [],
            'table' => $table->render(),
        ]))->render(ROOT . '/app/templates/content/feedback.tpl.php');

        $this->page->setContent($content);

        return $this->page->render();
    }
}

