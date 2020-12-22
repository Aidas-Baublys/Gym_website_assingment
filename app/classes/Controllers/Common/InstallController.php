<?php

namespace App\Controllers\Common;

use App\App;
use Core\FileDB;

class InstallController
{
    public function install()
    {
        App::$db = new FileDB(DB_FILE);

        // Users table
        App::$db->createTable('users');
        App::$db->insertRow('users', [
            'name' => 'Pispetras',
            'surname' => 'Pispetrauskas',
            'email' => 'pis@t.lt',
            'password' => 'pist',
            'phone' => '+37042013666',
            'address' => 'Saulėtekio al. 15, Vilnius',
        ]);
        App::$db->insertRow('users', [
            'name' => 'Pisjonas',
            'surname' => 'Pisjona',
            'email' => 'jonas@pis.com',
            'password' => 'pist',
            'phone' => '+6942013666',
            'address' => 'Tavo mamoj aveneu',
        ]);

        // Feedback (comments) table
        App::$db->createTable('comments');
        App::$db->insertRow('comments', [
            'user_id' => 0,
            'timestamp' => 1607641838,
            'comment' => 'Xjnia ne klubas nx',
        ]);
        App::$db->insertRow('comments', [
            'user_id' => 1,
            'timestamp' => 1608641838,
            'comment' => 'Negaliu atsidziaugt, jei galeciau, tai gyvenciau ten.',
        ]);

        print 'Duomenu bazė paruošta! Ruošk lašinius.';
    }
}

