<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="../../dist/demo.css">
        <title>demo</title>
    </head>
    <body>

        
        <?php

        var_dump($_POST);
        $slots_arr = [&$slot1,&$slot2,&$slot3];

        foreach ($_REQUEST as $key => $value) {
            if (array_key_exists($key,$slots_arr) )
            {
                $slots_arr[$key] = $value;
            }
        }
        
        
        $slots = count($slots_arr) ?>
    
        <?php echo($slot1) ?>
        <?php echo($slot2) ?>
        <?php echo($slot3) ?>
    </body>
</html>
