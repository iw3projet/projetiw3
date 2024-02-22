<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Page as ModelsPage;

class PagePreview
{

    public static function preview()
    {
        $page = "PagesTemplates/".$_GET["preview"];
        $view = new View($page,"front");;

    }

}
