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
use PDOException;

class PageBuilder
{

    public function createpage(): void
    {

        $form = new CreatePage();
        $configForm = $form->getConfig();
        $errors = [];

        $page = new Page();

        if ($_SERVER["REQUEST_METHOD"] == $configForm["config"]["method"]) {
            $verificator = new Verificator();
            
            if ($page->checkSlug($_REQUEST["slug"]) && $page->checkUnique("title",$_REQUEST["Title"])) 
            {
                if ($verificator->checkForm($configForm, $_REQUEST, $errors)) {
                    header('Location: /build?title=' . $_REQUEST["Title"] . '&tpl=' . $_REQUEST["template"] . '&slug=' . $_REQUEST["slug"]);
                }
            }else {
                $errors[] = "Paramètrage Incorrect ";
            }
            
            
        }

        $view = new View("Pages/createPage", "back");
        $view->assign("form", $configForm);
        $view->assign("formErrors", $errors);
    }

    public function SetComponent(): void
    {

        $builder = new Builder;
        $configForm = $builder->GenerateComponentForm($builder->GetTemplateSlots($_GET["tpl"]));


        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == $configForm["config"]["method"]) {
            $verificator = new Verificator();

            if ($verificator->checkForm($configForm, $_POST, $errors)) {
                try {
                    $Page = new Page;
                    var_dump($_REQUEST["slot1"]);
                    $Page->settitle(Verificator::securiseValue($_GET["title"]));


                    $content = [];

                    foreach ($_REQUEST as $key => $value) {
                        if (preg_match("/slot[\d]*\w+/", $key)) {
                            $content[$key] = $value ;
                        }
                    }


                    $json_content = json_encode($content);
                    $Page->setContent($json_content);
                    $Page->setSlug(Verificator::securiseValue($_GET["slug"]));
                    $Page->setTemplate(Verificator::securiseValue($_GET["tpl"]));
                    $Page->setUserId(Verificator::securiseValue($_SESSION["auth_user"]["id"]));
                    $Page->setCreated(date("Y-m-d H:i:s"));

                    
                    $Page->save();


                    header('Location: /');
                } catch (PDOException $err) {
                    $errors[] = $err;
                }
            }
        }
        $view = new View("Pages/addPageComponent", "back");
        $view->assign("form", $configForm);
        $view->assign("formErrors", $errors);
    }

    public static function preview() : void
    {
        $page = "PagesTemplates/".$_GET["preview"];
        $view = new View($page,"front");;

    }

    public function showAllPages() : void
    {

        $page = new Page();
        $pageList = $page->getAll();
        $view = new View("Pages/showAllPages","back");
        $view->assign("pages",$pageList);
    }

    public function deletePage() : void
    {   
        $pageId = $_GET["id"];

        $page = new Page();

        $page->deleteBy(["id" => $pageId]);

        header('Location: /showAllPages');

    }

    public function updatePage() : void 
    {
        $builder = new Builder;
        if (isset($_GET["content"])) {
            $configForm = $builder->GenerateComponentForm($builder->GetTemplateSlots($_GET["tpl"]),(array)json_decode($_GET["content"]));
        }else {
            $configForm = $builder->GenerateComponentForm($builder->GetTemplateSlots($_GET["tpl"]));

        }

        

        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == $configForm["config"]["method"]) {
            $verificator = new Verificator();

            if ($verificator->checkForm($configForm, $_POST, $errors)) {
                try {
                    $Page = new Page;
                    var_dump($_REQUEST["slot1"]);


                    $content = [];

                    foreach ($_REQUEST as $key => $value) {
                        if (preg_match("/slot[\d]*\w+/", $key)) {
                            $content[$key] = $value ;
                        }
                    }

                    $Page->setId(Verificator::securiseValue($_GET["id"]));
                    $json_content = json_encode($content);
                    $Page->setContent($json_content);
                    $Page->setUpdated(date("Y-m-d H:i:s"));

                    
                    $Page->save();


                    header('Location: /');
                } catch (PDOException $err) {
                    $errors[] = $err;
                }
            }
        }
        $view = new View("Pages/addPageComponent", "back");
        $view->assign("form", $configForm);
        $view->assign("formErrors", $errors);
    }

}
