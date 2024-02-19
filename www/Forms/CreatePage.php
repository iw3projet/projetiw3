<?php

namespace App\Forms;

class CreatePage {


    public function __construct(){

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
            "inputs" => [
                "Title" => [
                    "type" => "text",
                    "id" => "add_page-Ttile",
                    "required" => true,
                    "placeholder" => "Titre de la Page",
                    "value" => "",
                    "class" => "form-input",
                ],
                "template" => [
                    "type" => "text",
                    "id" => "add_page-template",
                    "required" => true,
                    "placeholder" => "Selectionner une template",
                    "value" => "",
                    "class" => "form-input",
                ],"slug" => [
                    "type" => "text",
                    "id" => "add_page-slug",
                    "required" => true,
                    "placeholder" => "ajouter un slug",
                    "value" => "",
                    "class" => "form-input",
                ],          
            ]
        ];
    }

}