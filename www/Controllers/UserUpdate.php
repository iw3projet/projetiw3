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
use App\Core\DB;
use App\Models\PasswordReset;

class UserUpdate{

    public function updateUser(): void
    {
        if (isset($_SESSION["auth_user"]["email"])) {
            $form = new UpdateUser();
            $configForm = $form->getConfig();

            $errors = [];

            if($_SERVER["REQUEST_METHOD"] == $configForm["config"]["method"]){
                $verificator = new Verificator();
                if($verificator->checkForm($configForm, $_REQUEST, $errors))
                {
                    $login = $_REQUEST['username'];
                    $delete= $_REQUEST['deleteUser'];

                    if ($delete !== '') {
                        if ($delete === "CONFIRMER") {
                            
                            $db = new DB();
                            $sql = "DELETE FROM ".PREFIX."_user WHERE email = :email";
                            $email = $_SESSION["auth_user"]["email"];

                            $db->select($sql, ["email" => $email]);


                            session_destroy();
                            header('Location: /');
                        }else {
                            $errors[]= "Vous devez bien taper 'CONFIRMER' afin de valider la suppression";
                        }
                    }

                    if ($login !== '' && $delete == "") {
                        $data = array("email" => $_SESSION["auth_user"]["email"]);
                        $user = new User();
                        $user_data = $user->getOneBy(["email" => $_SESSION["auth_user"]["email"]]);
                        $user->setId($user_data["id"]);
                        //var_dump($user);
                        $timestamp = date('Y-m-d H:i:s');
                        $user->setLogin($_REQUEST["username"]);
                        $user->setUpdated($timestamp);
                        $user->save();

                        header('Location: /');
                    }
                    
                    //header('Location: /');
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