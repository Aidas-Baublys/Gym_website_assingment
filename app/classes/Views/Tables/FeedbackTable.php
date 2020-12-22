<?php

namespace App\Views\Tables;

use App\Views\Table;

class FeedbackTable extends Table
{
    public function __construct($comments = [])
    {
        parent::__construct([
            'headers' => [
                'Vardas',
                'Tie žodžiai, ak...',
                'Data',
            ],
            'rows' => $comments
        ]);
    }
}
