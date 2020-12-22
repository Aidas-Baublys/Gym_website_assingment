<?php

namespace App\Controllers\Common;

use App\App;
use App\Views\BasePage;
use App\Views\Forms\Admin\Pizza\PizzaCreateForm;
use App\Views\Forms\Admin\Pizza\PizzaUpdateForm;
use Core\View;
use Core\Views\Link;

class HomeController
{
    protected $page;

    public function __construct()
    {
        $this->page = new BasePage([
            'title' => 'Pisporto Klubas',
            'js' => ['/media/js/home.js']
        ]);
    }
    
    public function index(): ?string
    {
        $services = [
            [
                'image' => '/media/img/Sportuok-kad-pistum-protą.jfif',
                'title' => 'PISPORTUOK!',
                'description' => 'Sportuok, kad pistum protą - PISPORTUOK! Tikrai turi nevalyvų slunkių draugų, bendradarbių ar giminių tarpe. Būk geresnis už juos - tiesiai jiems į akis!'
            ],
            [
                'image' => '/media/img/Instagramink-24-7.jfif',
                'title' => 'Instagramink 24/7!',
                'description' => 'Seilėtekio Pisporto Klubas nori, kad tau varvėtų prakaitas, kol kitiems seilės. Mūsų in-house profai fotografai, rašytojai bei media manageriai paruoš tobulus postus visiems tavo profiliams. Už papildomą kainą pridėsim net prakaitą su raumenim!'
            ],
            [
                'image' => '\media\img\Princesių-Pispilates.jfif',
                'title' => 'Princesių Pispilates',
                'description' => 'Ar esi bet kokio amžiaus moteris? Tu tikra super mega šaunuolė! Daryk tempimo pratimus su tiarą, kol treneris klauso visų tavo problemų bei ruošia mimozą. Imant metų abonimentą, klausys net tavo sapnų. Rimtu veidų!'
            ],
        ];

        $content = (new View([
            'title' => 'Sveiki atvykę į Seilėtekio Pisporto klubą!',
            'services' => $services ?? []
        ]))->render(ROOT . '/app/templates/content/index.tpl.php');

        $this->page->setContent($content);

        return $this->page->render();
    }
}

