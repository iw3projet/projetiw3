<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="../../dist/demo.css">
        <title>Back</title>
    </head>
    <body>
        <header class="header">
            <h1>template du back</h1>
        </header>
        <div class="containerBack">
            <nav class="navigation">
                <div class="leftSide">
                    <div class="dashboard-text">Dashboard</div>
                </div>
                <div class="leftSide">
                    <div class="article-text">Articles</div>
                </div>
                <div class="leftSide">
                    <div class="media-text">Medias</div>
                </div>
                <div class="leftSide">
                    <div class="page-text">Pages</div>
                </div>
                <div class="leftSide">
                    <div class="comment-text">Comments</div>
                </div>
                <div class="leftSide">
                    <div class="appearance-text">Appearance</div>
                </div>
                <div class="leftSide">
                    <div class="settings-text">Settings</div>
                </div>
                <div class="leftSide">
                    <div class="user-text">Users</div>
                </div>
                <div class="leftSide">
                    <div class="tools-text">Tools</div>
                </div>
            </nav>
            <main class="section">
                <?php include $this->view;?>
            </main>
        </div>
    </body>
</html>