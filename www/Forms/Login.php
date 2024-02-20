<?php
namespace App\Forms;
class Login
{

    public function __construct(){

    }

    public function getConfig(): array
    {
        return [
            "config"=>[
                "method"=>"POST",
                "action"=>"",
                "class"=>"formConnexion",
                "id"=>"form-login",
                "submit"=>"se connecter",
                "error"=>"Identifiants incorrects"
            ],
            "elements" => [

                "inputs"=>[
                    "email"=>[
                        "type"=>"email",
                        "id"=>"form-login-email",
                        "label"=>"EMAIL",
                        "required"=>true,
                        "placeholder"=>"Votre email",
                        "class"=>"formConnexion-input-group",
                    ],
                    "pwd"=>[
                        "type"=>"password",
                        "id"=>"form-login-pwd",
                        "label"=>"MOT DE PASSE",
                        "required"=>true,
                        "placeholder"=>"Votre mot de passe",
                        "class"=>"formConnexion-input-group",
                    ]
                ],
            ],

        ];
    }

}