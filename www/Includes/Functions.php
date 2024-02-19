<?php

namespace App\Includes;

use App\Models\User;


class Functions {

    

    public function is_framework_installed () {

        $optionsJson = file_get_contents('./options.json');

        $optionsArray = json_decode($optionsJson, true);

        if ($optionsArray === null) {
            die ("Error decoding JSON in 'options' file.");
        } else {
            $isInstalled = $optionsArray['is_installed'];
            //var_dump($isInstalled);
            if (!$isInstalled) {
                header('Location: /install');
            }
        }
    }

    public function add_first_user ($username, $pwd, $email) {

        try{
            $optionsJson = file_get_contents('./options.json');
            $optionsArray = json_decode($optionsJson, true);
            $user = new User();
            $user->setLogin($username);
            $user->setPwd($pwd);
            $user->setEmail($email);
            $user->save();
            $optionsArray["is_installed"] = true;
            $updatedJsonData = json_encode($optionsArray, JSON_PRETTY_PRINT);
            file_put_contents('./options.json', $updatedJsonData);
            
        }catch (\PDOException $exception){
            print_r($exception);
            return false;
        }

        return true;
    }

    public function deleteUser($email) {
        try {
            $sql = "DELETE FROM esgi_user WHERE email = :email";
            $data = array("email" => $email);
            $user = new User();
            $user->select($sql, $data);
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }
}
    

