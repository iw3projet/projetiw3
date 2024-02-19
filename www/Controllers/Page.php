<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Page as ModelsPage;

class Page
{

    public static function showBySlug( String $slug) : bool
    {
        ///recherche en BDD

        $dbPage = new ModelsPage;

        $data = $dbPage->getOneBy(["slug" => $slug]);

        if ($data != 0) 
        {
            $page = new Page();

        
            $page->show($data);
            return true;
        }
        else 
        {
            return false;
        }

    }

    public function show($data): void
    {


        $view = new View("PagesTemplates/".$data["template"]);
        $view->assign("content",$data["content"]);
    }

}
