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
            "inputs" => [
                "username" => [
                    "type" => "text",
                    "id" => "add_user-username",
                    "required" => true,
                    "placeholder" => "Votre nom d'utilisateur",
                    "class" => "form-input",
                ],
                "email" => [
                    "type" => "email",
                    "id" => "add_user-email",
                    "required" => true,
                    "placeholder" => "Votre email",
                    "class" => "form-input",
                ],
                "pwd" => [
                    "type" => "password",
                    "id" => "add_user-pwd",
                    "required" => true,
                    "placeholder" => "Votre mot de passe",
                    "class" => "form-input",
                ],
                "pwd_val" => [
                    "type" => "password",
                    "id" => "add_user-pwd-val",
                    "required" => true,
                    "placeholder" => "confirmer votre mot de passe",
                    "class" => "form-input",
                ],
            ]
        ];
    }

}