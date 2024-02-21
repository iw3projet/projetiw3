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
            $result["elements"]["wysiwyg"]["slot$i"] =
            [
                
                "id" => "add_page-slot$i",
                "name" => "Slot$i",
                "label" => "Slot$i",
                "script" => 'ClassicEditor
                .create( document.querySelector( \'#add_page-slot'.$i.'\' )).catch( err => {
                    console.error( err.stack );
                } );'

            ];

            
            // partie a ajouter pour l'image loader pas fonctionelle 
            // {
            //     ckfinder:
            //     {
            //       uploadUrl: \'uploadimg\'
            //     }
            //   } )
            // .then( editor => {
            //     window.editor = editor;
            // }
            
        }

        return $result;

    }

    public function generateWizy($nb)
    {   
        for ($i=0; $i <= $nb ; $i++) 
        { 
            echo '<div id="editor'.$i.'"></div>';
            echo '<script>
            ClassicEditor
                .create( document.querySelector( \'#editor'.$i.'\' ) )
                .catch( error => {
                    console.error( error );
                } );
             </script>';
        }

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