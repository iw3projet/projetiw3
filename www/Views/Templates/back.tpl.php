<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" content="width=device-width">
        <title>Back</title>
    </head>
    <body>
        <header class="header">
            <h1>template du back</h1>
        </header>
        <div class="containerBack">
            <nav class="navigation">
                <p class="leftSide button button-outline"><a href="#" class="dashboard-text">Dashboard</a></p>
                <p class="leftSide button button-outline"><a href="#" class="article-text">Articles</a></p>
                <p class="leftSide button button-outline"><a href="#" class="media-text">Medias</a></p>
                <p class="leftSide button button-outline"><a href="#" class="page-text">Pages</a></p>
                <p class="leftSide button button-outline"><a href="#" class="comment-text">Comments</a></p>
                <p class="leftSide button button-outline"><a href="#" class="appearance-text">Appearance</a></p>
                <p class="leftSide button button-outline"><a href="#" class="settings-text">Settings</a></p>
                <p class="leftSide button button-outline"><a href="#" class="user-text">Users</a></p>
                <p class="leftSide button button-outline"><a href="#" class="tools-text">Tools</a></p>
            </nav>
            <main class="section">
                <?php
                    include $this->view;   
                ?>
            </main>
        </div>
    </body>
</html>
