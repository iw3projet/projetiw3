<?php

namespace App\Controllers;

use App\Core\View;
use App\Core\Verificator;
use App\Forms\CreatePage;
use App\Forms\Login;
use App\Forms\Register;
use App\Models\Page;
use App\Models\User;

class Builder
{

    public function build(): void
    {

        $form = new CreatePage();

        if (array_key_exists("form_config",$_SESSION) ) 
        {
            $configForm = $_SESSION["form_config"];
            unset($_SESSION["form_config"]);

        }else {
            $configForm = $form->getConfig();
        }
        // $configForm = $form->getConfig();



        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == $configForm["config"]["method"]) {
            
            $verificator = new Verificator();
            //Est-ce que les données sont OK
            if ($verificator->checkForm($configForm, $_REQUEST, $errors)) {

                if (file_exists('Views/PagesTemplates/' . $_REQUEST["template"] . '.view.php')) {
                    ob_start();

                    include 'Views/PagesTemplates/' . $_REQUEST["template"] . '.view.php';
                    $contenu_inclus = ob_get_clean();

                    if (!array_key_exists("slot1", $configForm["inputs"])) {
                        for ($i = 1; $i <= $slots; $i++) {
                            $configForm["inputs"]["slot$i"] =
                                [
                                    "type" => "text",
                                    "id" => "add_page-slot$i",
                                    "required" => true,
                                    "placeholder" => "Selectionner une valeur pour le slot",
                                    "value" => "",
                                    "class" => "form-input",
                                ];
                        }
                        $configForm["input"]["title"];
                        $configForm["input"]["template"];
                        $_SESSION["form_config"] = $configForm;
                    }else {

                        var_dump($_REQUEST);
                        var_dump($configForm);
                        $Page = new Page;

                        $Page->settitle($_REQUEST["Title"]);


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
                        $Page->setTemplate($_REQUEST["template"]);
                        $Page->setUserId($_SESSION["auth_user"]["id"]);

                        $Page->save();

                        
                        header('Location: /');
                        
                        
                    }

                    

                    
                }

                
                foreach ($_REQUEST as $key => $value) {
                    if ($key != "config_form" && $value != "") {
                        $configForm["inputs"][$key]["value"] = $value;
                    }
                }

                
            }
            
        }
        $view = new View("Builder/createPage", "back");
        $view->assign("form", $configForm);
        $view->assign("formErrors", $errors);
    }
}
