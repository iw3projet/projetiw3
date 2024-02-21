<?php

namespace App\Forms;

class Register
{

    public function __construct()
    {
    }

    public function getConfig(): array
    {
        return [
            "config" => [
                "method" => "POST",
                "action" => "",
                "class" => "formInscription",
                "id" => "form-register",
                "submit" => "s'inscrire",
                "error" => "Identifiants incorrects"
            ],
            "elements" => [
                "inputs" => [
                    "firstname" => [
                        "type" => "text",
                        "id" => "form-register-firstname",
                        "label"=>"PRENOM",
                        "required" => true,
                        "placeholder" => "Votre Prénom",
                        "class" => "form-input",
                    ],
                    "lastname" => [
                        "type" => "text",
                        "id" => "form-register-lastname",
                        "label"=>"NOM",
                        "required" => true,
                        "placeholder" => "Votre Nom",
                        "class" => "form-input",
                    ],
                    "email" => [
                        "type" => "email",
                        "id" => "form-register-email",
                        "label"=>"EMAIL",
                        "required" => true,
                        "placeholder" => "Votre email",
                        "class" => "form-input",
                    ],
                    "pwd" => [
                        "type" => "password",
                        "id" => "form-register-pwd",
                        "label"=>"MOT DE PASSE",
                        "required" => true,
                        "placeholder" => "Votre mot de passe",
                        "class" => "form-input",
                    ],
                    "pwd_val" => [
                        "type" => "password",
                        "id" => "form-register-pwd-val",
                        "label"=>"CONFIRMEZ VOTRE MOT DE PASSE",
                        "required" => true,
                        "placeholder" => "confirmer votre mot de passe",
                        "class" => "form-input",
                    ],
                    
                ],
            ],
        ];
    }
}
