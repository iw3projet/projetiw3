<?php

namespace App\Core;

class Verificator
{

    public function checkForm($config, $data, &$errors): bool
    {
        if( count($config['inputs']) != count($data)){
            die("Tentative de hack");
        }
        //Token CSRF ????
        foreach ($config['inputs'] as $name=>$input){
            if(!isset($data[$name])){
                die("Tentative de hack");
            }
            //Commencer à traiter les verification micro
            if($input["type"]=="email" && !self::checkEmail($data[$name])){
                $errors[]="Email incorrect";
            }
            else if($input["type"]=="password" && !self::checkPwd($data[$name])){
                $errors[]="Mot de passe incorrect";
            }
            else if($input["type"]=="password"){
                if ($name=="pwd_val" && !self::comparePwds($data[$name], $data["pwd"])) {
                    $errors[]="Les mots de passes doivent être identiques";
                }
            }
        }


        return empty($errors);
    }

    public static function checkPwd(String $pwd): bool
    {
        return (strlen($pwd)>=8 &&
            preg_match("#[a-z]#", $pwd) &&
            preg_match("#[A-Z]#", $pwd) &&
            preg_match("#[0-9]#", $pwd)
            );
    }

    public static function comparePwds(String $pwd1, String $pwd2): bool
    {
        return ($pwd1 == $pwd2);
    }

    public static function checkEmail(String $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function doesEmailExists ($email): bool|object|string|array
    {
        try {
            $optionsJson = file_get_contents('./options.json');
            $optionsArray = json_decode($optionsJson, true);
            $pdo = new \PDO("pgsql:host=".$optionsArray["db_host"].";port=5432;dbname=".$optionsArray["db_name"] , $optionsArray["db_username"], $optionsArray["db_pwd"]);
        } catch (\PDOException $exception) {
            return false;
        }

        $sql = 'SELECT * FROM esgi_user WHERE email = :email';
        $query= $pdo->prepare($sql);
        $query->execute(['email'=> $email]);

        $result =  $query->fetch(\PDO::FETCH_ASSOC);

        if (!$result) {
            return false;
        }else {
            return $result;
        }
    }

    public static function doesKeyMatches ($key,$email): bool|object|string|array
    {
        try {
            $optionsJson = file_get_contents('./options.json');
            $optionsArray = json_decode($optionsJson, true);
            $pdo = new \PDO("pgsql:host=".$optionsArray["db_host"].";port=5432;dbname=".$optionsArray["db_name"] , $optionsArray["db_username"], $optionsArray["db_pwd"]);
        } catch (\PDOException $exception) {
            return false;
        }

        $sql = "SELECT COUNT(*) FROM esgi_passwordreset WHERE email = :email AND key = :key";
        $query= $pdo->prepare($sql);
        $query->execute(['email'=> $email, 'key' => $key]);

        $result =  $query->fetch(\PDO::FETCH_NUM);

        if ($result == 0) {
            return false;
        }

        $sql = 'SELECT * FROM esgi_user WHERE email = :email';
        $query= $pdo->prepare($sql);
        $query->execute(['email'=> $email]);

        $result =  $query->fetch(\PDO::FETCH_ASSOC);

        return $result;


    }

    public function is_db_valid ($db_host, $db_name, $db_username, $db_pwd) {

        try{
            $optionsJson = file_get_contents('./options.json');
            $optionsArray = json_decode($optionsJson, true);
            $pdo = new \PDO("pgsql:host=".$db_host.";port=5432;dbname=".$db_name , $db_username, $db_pwd);
            $scriptContent = file_get_contents('./esgi.sql');
            $pdo->exec($scriptContent);
            print_r('ici');
            //$pwd = password_hash($db_pwd, PASSWORD_DEFAULT);
            $optionsArray["is_db_installed"] = true;
            $optionsArray["db_host"] = $db_host;
            $optionsArray["db_name"] = $db_name;
            $optionsArray["db_username"] = $db_username;
            $optionsArray["db_pwd"] = $db_pwd;
            $updatedJsonData = json_encode($optionsArray, JSON_PRETTY_PRINT);
            file_put_contents('./options.json', $updatedJsonData);
            
        }catch (\PDOException $exception){
            echo $exception;
            return false;
        }

        return true;
    }

    

}