<?php
namespace App\Controllers;

class Error {
    public function page404(): void
    {
        http_response_code(404);
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Page non trouvée</title>
        </head>
        <body>
            <div class="error-message">
                <p>Oops! Erreur 404</p>
            </div>
        </body>
        </html>
        <?php
        exit; // Arrête l'exécution du script après avoir affiché la page 404
    }

    public function notConnected(): void
    {
        echo "vous devez être connecté pour accéder à cette page";
    }

}

