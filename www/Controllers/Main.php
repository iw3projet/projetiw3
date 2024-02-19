<?php
namespace App\Controllers;

class Main{

    public function home(): void
    {
        if (isset($_SESSION["auth_user"])) {
            echo "Bonjour ".$_SESSION["auth_user"]["email"];
        }else {
            echo "Page d'acceuil";
        }
        
    }

    public function aboutUs(): void
    {
        echo "ceci est la page a propos";
    }

}