<?php

namespace App\Controllers;

use App\Core\View;
use App\Core\Verificator;
use App\Forms\DbVerif;

class SitemapController
{
    public function index()
    {
        // Récupère toutes les URL du site à partir de la bdd ou de votre système de routage
        $urls = [
            'http://yoursite.com/',
            'http://yoursite.com/page1',
            'http://yoursite.com/page2',
            // Ajoutez plus d'URL ici
        ];

        // Définir le type de contenu
        header('Content-type: text/xml');
        echo '<?xml version="1.0" encoding="UTF-8" ?>';

        // Commencer à générer le sitemap
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        foreach ($urls as $url) {
            echo '<url>';
            echo '<loc>' . $url . '</loc>';
            echo '<lastmod>' . date('Y-m-d') . '</lastmod>';
            echo '<changefreq>weekly</changefreq>';
            echo '<priority>0.8</priority>';
            echo '</url>';
        }
        echo '</urlset>';
    }
}
