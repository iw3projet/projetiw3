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
        $errors = [];

        if($_SERVER["REQUEST_METHOD"] == $configForm["config"]["method"]){
            $verificator = new Verificator();
            if($verificator->checkForm($configForm, $_REQUEST, $errors))
            {
                $user = new User;
                $user_data = $user->getOneBy(["email" => $_REQUEST["email"]]);

                if (!$user_data == 0) 
                {
                    
                    if (password_verify($_REQUEST["pwd"],$user_data["password"])) 
                    {
                        $_SESSION["auth_user"]["email"] = $user_data["email"];
                        $_SESSION["auth_user"]["id"] = $user_data["id"];
                        header('Location: /');
                    }
                }else {
                    $errors[] = "Identifiants inccorects";
                }
  
            }else{
                $_POST["user"] = "test";

            }
        }

        $view = new View("Security/login", "back");
        $view->assign("form", $configForm);
        $view->assign("formErrors", $errors);
    }


    public function logout(): void
    {
        session_destroy();
        echo "Vous vous etes bien déconnecter";
    }


    public function register(): void
    {
        $form = new Register();
        $configForm = $form->getConfig();

        $errors = [];

        if($_SERVER["REQUEST_METHOD"] == $configForm["config"]["method"]){
            $verificator = new Verificator();
            if($verificator->checkForm($configForm, $_REQUEST, $errors))
            {
                $user = new User();
                $user->setLogin(Verificator::securiseValue($_REQUEST['username']));
                $user->setEmail(Verificator::securiseValue($_REQUEST['email']));
                $user->role(4);
                $user->setPwd(Verificator::securiseValue($_REQUEST['pwd']));
                $user->save();
                header('Location: /');
            }
        }

        $view = new View("Security/register", "back");
        $view->assign("form", $configForm);
        $view->assign("formErrors", $errors);
    }



}
