<?php

namespace App\Core;

class Builder
{

    public function GenerateComponentForm($nb) : array 
    {
        $result = [];

        $result["config"] = [
            "method" => "POST",
            "action" => "",
            "class" => "form",
            "id" => "add_page",
            "submit" => "Créer la page",
            "error" => "Paramètrage incorrect"
        ];

        for ($i=1; $i <= $nb; $i++) {
            $result["elements"]["inputs"]["slot$i"] =
            [
                "type" => "text",
                "id" => "add_page-slot$i",
                "label" => "Slot$i",
                "required" => true,
                "placeholder" => "Selectionner une valeur pour le slot",
                "value" => "",
                "class" => "form-input",
            ];
        }

        return $result;

    }

    public function GetTemplateSlots($tpl): int 
    {
        if (file_exists('Views/PagesTemplates/' . $tpl . '.view.php')) {
        ob_start();

        include 'Views/PagesTemplates/' . $tpl . '.view.php';
        $contenu_inclus = ob_get_clean();
        return $slots;
        }

    }

}