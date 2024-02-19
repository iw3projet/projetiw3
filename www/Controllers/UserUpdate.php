<?php

namespace App\Controllers;


use App\Core\View;
use App\Core\Verificator;
use App\Core\EmailSender;
use App\Forms\DbVerif;
use App\Forms\UpdateUser;
use App\Forms\ResetPwd;
use App\Includes\Functions;
use App\Models\User;
use App\Models\PasswordReset;

class UserUpdate{

    public function updateUser(): void
    {
        $_SESSION["email"] = "beggararezki@gmail.com";
        if (isset($_SESSION["email"])) {
            $form = new UpdateUser();
            $configForm = $form->getConfig();

            $errors = [];

            if($_SERVER["REQUEST_METHOD"] == $configForm["config"]["method"]){
                $verificator = new Verificator();
                //Est-ce que les données sont OK
                if($verificator->checkForm($configForm, $_REQUEST, $errors))
                {
                    // $result = $verificator -> doesEmailExists($_SESSION['email']);
                    
                    // if (!$result) {
                    //     var_dump($result);
                    //     $errors[]="L'email n'existe pas";
                    // }else {

                    //var_dump($_SESSION);
                    $login = $_REQUEST['username'];
                    $data = array("email" => $_SESSION['email']);
                    $user = new User();
                    $user->setLogin("sdfgsd");
                    //var_dump($user->getLogin());
                    $email = $_SESSION['email'];
                    $user_data = $user->getOneBy(["email" => $_SESSION['email']], "object");
                    var_dump($user_data);
                    $newUser = new User();
                    // $newUser->populate($oldUser["id"]);
                    // //var_dump($newUser);                    
                    // $newUser->setLogin($_REQUEST["username"]);
                    // $newUser->save();

                    //header('Location: /');
                    //}
                }
            }

            $view = new View("Account/updateUser", "back");
            $view->assign("form", $configForm);
            $view->assign("formErrors", $errors);
        }else {
            header('Location: /connection-error');
        }
            
    }
}