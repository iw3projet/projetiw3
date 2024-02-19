<?php

namespace App\Forms;

class DbVerif {


    public function __construct(){

    }

    public function getConfig(): array
    {
        return [
            "config" => [
                "method" => "POST",
                "action" => "",
                "class" => "form",
                "id" => "verif_db",
                "submit" => "se connecter à la bdd",
                "error" => "Base de données incorrecte"
            ],
            "inputs" => [
                "db_host" => [
                    "type" => "text",
                    "id" => "verif_db-db_host",
                    "label"=>"HOST BASE DE DONNEES",
                    "required" => true,
                    "placeholder" => "DB Host",
                    "class" => "form-input",
                ],
                "db_name" => [
                    "type" => "text",
                    "id" => "verif_db-db_name",
                    "label"=>"NOM BASE DE DONNEES",
                    "required" => true,
                    "placeholder" => "DB Name",
                    "class" => "form-input",
                ],
                "db_userName" => [
                    "type" => "text",
                    "id" => "verif_db-db_userName",
                    "label"=>"NOM UTILISATEUR",
                    "required" => true,
                    "placeholder" => "DB UserName",
                    "class" => "form-input",
                ],
                "db_pwd" => [
                    "type" => "db_password",
                    "id" => "verif_db-db_pwd",
                    "label"=>"MOT DE PASSE BDD",
                    "required" => true,
                    "placeholder" => "DB Pwd",
                    "class" => "form-input",
                ]                
            ]
        ];
    }

}