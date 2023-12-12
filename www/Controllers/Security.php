<?php

namespace App\Controllers;

use App\Core\View;
use App\Forms\Login;
use App\Forms\Register;
use App\Models\User;

class Security
{

    public function login(): void
    {
        $form = new Login();
        $configForm = $form->getConfig();

        print_r($_POST);

        $view = new View("Security/login", "back");
        $view->assign("form", $configForm);
    }
    public function logout(): void
    {
        echo "Logout";
    }
    public function register(): void
    {
        $form = new Register();
        $configForm = $form->getConfig();



        $view = new View("Security/register", "back");
        $view->assign("form", $configForm);

        if (isset($_POST["firstname"])) {
            $newUser = new User;

            if ($_POST["pwd"] == $_POST["pwd_val"]) {
                $newUser->setFirstname($_POST["firstname"]);
                $newUser->setLastname($_POST["lastname"]);
                $newUser->setEmail($_POST["email"]);
                $newUser->setPwd($_POST["pwd"]);
                $newUser->save();
            }else {
                print_r("password dont match");
            }
        }
    }
}
