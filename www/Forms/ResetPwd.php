<?php
namespace App\Forms;

class ResetPwd
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
                "submit"=>"Reinitialiser ",
                "error"=>"Mot de passe incorrect"
            ],
            "inputs"=>[
                "pwd" => [
                    "type" => "password",
                    "id" => "form-resetPwd-pwd",
                    "required" => true,
                    "placeholder" => "Votre mot de passe",
                    "class" => "form-input",
                ],
                "pwd_val" => [
                    "type" => "password",
                    "id" => "form-resetPwd-pwd-val",
                    "required" => true,
                    "placeholder" => "Confirmer votre mot de passe",
                    "class" => "form-input",
                ],
            ]
        ];
    }

}