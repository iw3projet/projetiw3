<?php
namespace App\Forms;

class UpdateUser
{

    public function __construct(){

    }

    public function getConfig(): array
    {
        return [
            "config"=>[
                "method"=>"POST",
                "action"=>"",
                "class"=>"form",
                "id"=>"form-update-user",
                "submit"=>"Modifier ",
                "error"=>"Une erreur est survenue"
            ],
            "inputs"=>[
                "username" => [
                    "type" => "text",
                    "id" => "form-update-user",
                    "required" => false,
                    "placeholder" => "Nouveau nom d'utilisateur",
                    "class" => "form-input",
                ],
                "deleteUser" => [
                    "type" => "text",
                    "id" => "form-update-user",
                    "required" => false,
                    "placeholder" => "'CONFIRMER' pour supprimer",
                    "class" => "form-input",
                ],
            ],
        ];
    }

}