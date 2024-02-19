<?php
namespace App\Controllers;

use App\Core\View;
use App\Forms\Contact;


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
        $form = new Contact();
        $configForm = $form->getConfig();
        $view = new View("Main/contact", "front");
        $view->assign("form", $configForm);
    }
}