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

    public function is_db_valid ($db_host, $db_name, $db_username, $db_pwd) {

        try{
            $optionsJson = file_get_contents('./options.json');
            $optionsArray = json_decode($optionsJson, true);
            $pdo = new \PDO("pgsql:host=".$db_host.";port=5432;dbname=".$db_name , $db_username, $db_pwd);
            $scriptContent = file_get_contents('./esgi.sql');
            $pdo->exec($scriptContent);
            //$pwd = password_hash($db_pwd, PASSWORD_DEFAULT);
            $optionsArray["is_db_installed"] = true;
            $optionsArray["db_host"] = $db_host;
            $optionsArray["db_name"] = $db_name;
            $optionsArray["db_username"] = $db_username;
            $optionsArray["db_pwd"] = $db_pwd;
            $updatedJsonData = json_encode($optionsArray, JSON_PRETTY_PRINT);
            file_put_contents('./options.json', $updatedJsonData);
            
        }catch (\PDOException $exception){
            return false;
        }

        return true;
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
}
    

