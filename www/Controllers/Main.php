<?php
namespace App\Controllers;

use App\Core\View;


class Main {
    public function home(): void {
        if (isset($_SESSION["auth_user"])) {
            echo "Bonjour ".$_SESSION["auth_user"]["email"];
        }else {
            $view = new View("Main/home", "front");
        }
    }

    public function aboutUs(): void {
        $view = new View("Main/aboutUs", "front");
    }

    public function contact(): void {
        $view = new View("Main/contact", "front");
    }
}