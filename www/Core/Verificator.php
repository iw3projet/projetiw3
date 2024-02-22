<?php

namespace App\Core;

use LDAP\Result;

use App\Includes\Functions;

class Verificator
{

    public function checkForm($config, $data, &$errors): bool
    {


        $inputs = 0;

        foreach ($config['elements'] as $elem => $value_elem) 
        {
            foreach ($config['elements'][$elem] as $key => $value) 
            {
                $inputs += 1;
            }
        }

        if( $inputs != count($data)){
            
            die("Tentative de hack");
        }
        //Token CSRF ????
        if (array_key_exists("inputs",$config['elements'])) 
        {
            foreach ($config['elements']['inputs'] as $name=>$input){
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

    public static function securiseValue(String $value): string
    {
        $result = "";


        $value = strip_tags($value);



        $result = htmlspecialchars($value);

        return $result;
    }

    // public static function checkDB(): bool
    // {

    // }
    public static function doesEmailExists ($email): bool|object|string|array
    {
        try {
            $pdo = new \PDO("pgsql:host=".DB_HOST.";port=5432;dbname=".DB_NAME, DB_USERNAME, DB_PWD);
        } catch (\PDOException $exception) {
            return false;
        }

        $email = strtolower($email); 

        $sql = 'SELECT * FROM '.PREFIX.'_user WHERE email = :email';
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
            $pdo = new \PDO("pgsql:host=".DB_HOST.";port=5432;dbname=".DB_NAME, DB_USERNAME, DB_PWD);
        } catch (\PDOException $exception) {
            return false;
        }

        $sql = "SELECT COUNT(*) FROM ".PREFIX."_passwordreset WHERE email = :email AND key = :key";
        $query= $pdo->prepare($sql);
        $query->execute(['email'=> $email, 'key' => $key]);

        $result =  $query->fetch(\PDO::FETCH_NUM);

        if ($result == 0) {
            return false;
        }

        $sql = 'SELECT * FROM '.PREFIX.'_user WHERE email = :email';
        $query= $pdo->prepare($sql);
        $query->execute(['email'=> $email]);

        $result =  $query->fetch(\PDO::FETCH_ASSOC);

        return $result;


    }

    public function is_db_valid ($db_host, $db_name, $db_username, $db_pwd) {

        try{
            $function = new Functions();
            $pdo = new \PDO("pgsql:host=".$db_host.";port=5432;dbname=".$db_name , $db_username, $db_pwd);
            $scriptContent = file_get_contents('./esgi.sql');
            
            $prefix = $function->generateRandomString();
            $scriptEditedContent = str_replace("iciprefix", $prefix, $scriptContent);

            $function = new Functions();
            $create = $function->createConstFile($db_host, $db_name, $db_username, $db_pwd);


            $path = 'Constantes.php';
            $content = '
            define("PREFIX", "'.$prefix.'");';
            file_put_contents($path, $content, FILE_APPEND);

            require_once("Constantes.php");

            $pdo->exec($scriptEditedContent);
            //$pwd = password_hash($db_pwd, PASSWORD_DEFAULT);


            // var_dump("là");

            
            // $updatedJsonData = json_encode($optionsArray, JSON_PRETTY_PRINT);
            // file_put_contents('./options.json', $updatedJsonData);

            return true;
            
        }catch (\PDOException $exception){
            echo $exception;
            return false;
        }

    }

    

}