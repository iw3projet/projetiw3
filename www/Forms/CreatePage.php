<?php

namespace App\Forms;

class CreatePage {


    public function __construct(){

    }

    public function getAllPageTemplate(): array
    {   
        $result = [];
        
        if (is_dir(__DIR__."/../Views/PagesTemplates/")) 
        {
            $result = preg_grep('/^([^.])/', scandir(__DIR__."/../Views/PagesTemplates/"));

            foreach ($result as $key => $value) 
            {
             $result[$key] = str_replace(".view.php", "", $value);
     
            }
            return $result;

        }else {
            return $result["Aucunne Template !!"];
        }
      
    }



    public function getConfig(): array
    {


        return [
            "config" => [
                "method" => "POST",
                "action" => "",
                "class" => "form",
                "id" => "add_page",
                "submit" => "Créer la page",
                "error" => "Paramètrage incorrect"
            ],
            "elements" => [
                "inputs" => [
                    "Title" => [
                        "type" => "text",
                        "id" => "add_page-Ttile",
                        "label" => "TITRE",
                        "required" => true,
                        "placeholder" => "Titre de la Page",
                        "value" => "",
                        "class" => "form-input",
                    ],
                    "slug" => [
                        "type" => "text",
                        "id" => "add_page-slug",
                        "label" => "SLUG",
                        "required" => true,
                        "placeholder" => "ajouter un slug",
                        "value" => "",
                        "class" => "form-input",
                    ],
                         
                ],
                "selects" => [
                    "template" => [
                        "name" => "add_page-template",
                        "class" => "form-select",
                        "id" => "add_page-template",
                        "label" => "TEMPLATE",
                        "required" => true,
                        "options" => $this->getAllPageTemplate(),
                    ],
    
                ],

            ],
            
        ];
    }

}