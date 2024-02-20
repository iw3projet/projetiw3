<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="../../dist/demo.css">
        <title>demo</title>
    </head>
    <body>

        
        <?php

        $slot1 = null;
        $slot2 = null;
        $slot3 = null;
        $slot4 = null;

        $slots = 4 ;

        $json_content = $this->data;
        $content = json_decode($json_content["content"]);

        foreach ($content as $key => $value) 
        {   
            $$key = $value;
        }
        
        
        echo("<h1>$slot1</h1>");
        echo("<h2>$slot2</h2>");
        echo("<h3>$slot3</h3>");
        echo("<h4>$slot4</h4>");
        ?>
    

    </body>
</html>
