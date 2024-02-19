<?php

namespace App\Controllers;

use App\Core\Builder;
use App\Core\View;
use App\Core\Verificator;
use App\Forms\CreatePage;
use App\Forms\Login;
use App\Forms\Register;
use App\Models\Page;
use App\Models\User;

class PageBuilder
{

    public function createpage(): void
    {

        $form = new CreatePage();
        $configForm = $form->getConfig();
        $errors = [];

        $builder = new Builder;

        if($_SERVER["REQUEST_METHOD"] == $configForm["config"]["method"]){
            $verificator = new Verificator();
            //Est-ce que les données sont OK
            if($verificator->checkForm($configForm, $_REQUEST, $errors))
            {
                
                header('Location: /build?title='.$_REQUEST["Title"].'&tpl='.$_REQUEST["template"].'&slug='.$_REQUEST["slug"]);
            }
        }

        $view = new View("Builder/createPage", "back");
        $view->assign("form", $configForm);
        $view->assign("formErrors", $errors);
        
  
    }

    public function SetComponent() : void 
    {

        $builder = new Builder;
        $configForm = $builder->GenerateComponentForm($builder->GetTemplateSlots($_GET["tpl"]));


        $errors = [];

        if($_SERVER["REQUEST_METHOD"] == $configForm["config"]["method"]){
            $verificator = new Verificator();

            if($verificator->checkForm($configForm, $_POST, $errors))
            {   
                $Page = new Page;

                $Page->settitle($_GET["title"]);


                $content = [];

                foreach ($_REQUEST as $key => $value) 
                {
                    if (preg_match("/slot[\d]*\w+/",$key)) 
                    {
                        $content[$key] = $value;
                    }
                }

                $json_content = json_encode($content);

                $Page->setContent($json_content);
                $Page->setSlug($_GET["slug"]);
                $Page->setTemplate($_GET["tpl"]);
                $Page->setUserId($_SESSION["auth_user"]["id"]);
                $Page->setCreated(date("Y-m-d H:i:s"));

                $Page->save();

                
                header('Location: /');
                
            }
        }
        $view = new View("Builder/addPageComponent", "back");
        $view->assign("form", $configForm);
        $view->assign("formErrors", $errors);
    }
}
