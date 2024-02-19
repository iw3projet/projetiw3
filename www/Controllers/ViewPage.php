<?php

namespace App\Controllers;

use App\Core\View;
use App\Core\Verificator;
use App\Forms\CreatePage;
use App\Forms\Login;
use App\Forms\Register;
use App\Models\User;

class ViewPage
{

    public function show(): void
    {

        
        $view = new View("PagesTemplates/page_demo", "front");

    }
}
