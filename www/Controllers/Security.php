<?php

namespace App\Controllers;

use App\Core\View;
use App\Core\Verificator;
use App\Forms\Login;
use App\Forms\Register;
use App\Models\User;

class Security
{

    public function login(): void
    {
        $form = new Login();
        $configForm = $form->getConfig();

        //print_r($_POST);

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

        $errors = [];

        if($_SERVER["REQUEST_METHOD"] == $configForm["config"]["method"]){
            $verificator = new Verificator();
            //Est-ce que les données sont OK
            if($verificator->checkForm($configForm, $_REQUEST, $errors))
            {
                $user = new User();
                $user->setFirstname($_REQUEST['firstname']);
                $user->setLastname($_REQUEST['lastname']);
                $user->setEmail($_REQUEST['email']);
                $user->setPwd($_REQUEST['pwd']);
                $user->save();
                header('Location: /');
            }
        }

        $view = new View("Security/register", "back");
        $view->assign("form", $configForm);
        $view->assign("formErrors", $errors);
    }



}
