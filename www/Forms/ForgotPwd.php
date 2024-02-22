<?php
namespace App\Forms;
class ForgotPwd
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
                "id"=>"form-login",
                "submit"=>"Envoyer un mail",
                "error"=>"Mail incorrect"
            ],
            "elements" => [

                "inputs"=>[
                    "email"=>[
                        "type"=>"email",
                        "id"=>"form-forgotPwd-email",
                        "label"=>"EMAIL",
                        "required"=>true,
                        "placeholder"=>"Votre email",
                        "class"=>"form-input",
                    ],
                ]
            ],
        ];
    }

}