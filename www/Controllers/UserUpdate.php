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
                        $user->setLogin($_REQUEST["username"]);
                        $user->save();

                        header('Location: /');
                    }
                    
                    header('Location: /404');
                }
            }

            $view = new View("Account/updateUser", "back");
            $view->assign("form", $configForm);
            $view->assign("formErrors", $errors);
        }else {
            header('Location: /connection-error');
        }
            
    }

    public function updateRoleUser()
{
    $allUsers = new User();
    $allUsers = $allUsers->getAll();

    if (isset($_SESSION["auth_user"]) && !empty($_SESSION["auth_user"]["email"])) {
        $user = new User();
        $userData = $user->getOneBy(["email" => $_SESSION["auth_user"]["email"]]);
        if ($userData["role"] == 1 ) {
            if (isset($_REQUEST['action'])) {
                $action = $_REQUEST['action'];
                $user = new User();

                if ($action == '2') {
                    $user->setId($_REQUEST['userId']);
                    $user->setRole(2);
                    $user->save();
                } elseif ($action == '3') {
                    $user->setId($_REQUEST['userId']);
                    $user->setRole(3);
                    $user->save();
                } elseif ($action == '4') {
                    $user->setId($_REQUEST['userId']);
                    $user->setRole(4);
                    $user->save();
                } else {
                    $errors[] = "Action non valide.";
                }


                header('Location: /role');
                exit;
            }
        } else {
            header('Location: /404');
        }
    } else {
        header('Location: /404');
    }

    $view = new View("Admin/role", "back");
    $view->assign("users", $allUsers);
}

}