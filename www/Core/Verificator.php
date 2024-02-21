<?php

namespace App\Core;

use LDAP\Result;

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

    

}