<?php

namespace App\Forms;

class AddUser {


    public function __construct(){

    }

    public function getConfig(): array
    {
        return [
            "config" => [
                "method" => "POST",
                "action" => "",
                "class" => "form",
                "id" => "add_user",
                "submit" => "Ajouter",
                "error" => "Identifiants incorrects"
            ],
            "elements" => [
                "inputs" => [
                    "username" => [
                        "type" => "text",
                        "id" => "add_user-username",
                        "label"=>"NOM UTILISATEUR",
                        "required" => true,
                        "placeholder" => "Votre nom d'utilisateur",
                        "class" => "form-input",
                    ],
                    "email" => [
                        "type" => "email",
                        "id" => "add_user-email",
                        "label"=>"EMAIL",
                        "required" => true,
                        "placeholder" => "Votre email",
                        "class" => "form-input",
                    ],
                    "pwd" => [
                        "type" => "password",
                        "id" => "add_user-pwd",
                        "label"=>"MOT DE PASSE",
                        "required" => true,
                        "placeholder" => "Votre mot de passe",
                        "class" => "form-input",
                    ],
                    "pwd_val" => [
                        "type" => "password",
                        "id" => "add_user-pwd-val",
                        "label"=>"CONFIRMATION DU MOT DE PASSE",
                        "required" => true,
                        "placeholder" => "confirmer votre mot de passe",
                        "class" => "form-input",
                    ],           
                ],
                
            ]
            
        ];
    }

}