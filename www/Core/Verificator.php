<?php

namespace App\Core;

class Verificator
{

    public function checkForm($config, $data, &$errors, $update=0): bool
{
    if($update){
        $inputs = 1;
    }
    else{
        $inputs = 0;  
    }
    
    foreach ($config['elements'] as $elem => $value_elem) {
        foreach ($config['elements'][$elem] as $key => $value) {
            $inputs += 1;
        }
    }
    
    if ($inputs != count($data)) {
        var_dump($data);
        var_dump($inputs);
        // Le nombre de champs dans le formulaire ne correspond pas au nombre attendu
        $errors[] = "Tentative de hack";
        return false;
    }

    // Vérifier chaque champ du formulaire
    foreach ($config['elements']['inputs'] as $name => $input) {
        if (!isset($data[$name])) {
            // Le champ requis n'est pas présent dans les données
            $errors[] = "Tentative de hack";
            return false;
        }
        //Commencer à traiter les vérifications spécifiques pour chaque champ
        if ($input["type"] == "email" && !self::checkEmail($data[$name])) {
            $errors[] = "Email incorrect";
            return false;
        } elseif ($input["type"] == "password" && !self::checkPwd($data[$name])) {
            $errors[] = "Mot de passe incorrect";
            return false;
        }
    }

    // Toutes les vérifications ont réussi
    return true;
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

    // public static function checkDB(): bool
    // {

    // }

    

}