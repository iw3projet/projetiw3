<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" content="width=device-width">
        <title>Back</title>
        <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
    </head>
    <body>
        
        <header class="header">
            <!-- <h1>template du back</h1> -->
            <img src="/images/GastroMaker.png" alt="Logo" class="logo">
        </header>
        <div class="containerBack">
            <nav class="navigation">
                <p class="leftSide button button-outline"><a href="/prebuild" class="dashboard-text">Creation</a></p>
                <p class="leftSide button button-outline"><a href="#" class="page-text">Pages</a></p>
                <p class="leftSide button button-outline"><a href="#" class="comment-text">Comments</a></p>
                <p class="leftSide button button-outline"><a href="/update-user" class="user-text">Users</a></p>
            </nav>
            <main class="section">
                <?php
                    include $this->view;   
                ?>
            </main>
        </div>
    </body>
</html>