<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="../../dist/demo.css">
        <title>Back</title>
    </head>
    <body>
        <h1>template du back</h1>
        <header class="header">
            <!-- <img src="" alt="Logo" class="dashboard-icon"> -->
                <!-- <p class="name">Name, Admin</p> -->
                <!-- <p class="secondary-text">photo</p> -->
        </header>
        <div class="containerBack">
            <nav class="navigation">
                <div class="leftSide">
                    <div class="dashboard-text">Dashboard</div>
                    <!-- <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/43e4e9ad5fc41683d16b3af78e3e3dff41e62244a15bf098f347a765ccf0597f?apiKey=72257b775bae4669922439278ecc9058&" alt="Dashboard" class="dashboard-icon"> -->
                </div>
                <div class="leftSide">
                    <div class="article-text">Articles</div>
                    <!-- <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/12d2416875d1804d93ac355fd92edbc82e47ae72c1b4bc30025d201813b7e976?apiKey=72257b775bae4669922439278ecc9058&" alt="Medias" class="media-icon"> -->
                </div>
                <div class="leftSide">
                    <div class="media-text">Medias</div>
                    <!-- <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/85db6f37cde91818132451579453149444baa9dd15be5ede6d43196bae244128?apiKey=72257b775bae4669922439278ecc9058&" alt="Pages" class="page-icon"> -->
                </div>
                <div class="leftSide">
                    <div class="page-text">Pages</div>
                </div>
                <div class="leftSide">
                    <!-- <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/b827ee67b15e8f8f425745e0bf603c2082d6916a46f6f413c1b5c19641bc4d70?apiKey=72257b775bae4669922439278ecc9058&" alt="Comments" class="comment-icon"> -->
                    <div class="comment-text">Comments</div>
                </div>
                <div class="leftSide">
                    <!-- <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/9279985f5d293f1c26b02b0332e97603d317cc25160072dade07644c81270449?apiKey=72257b775bae4669922439278ecc9058&" alt="Appearance" class="appearance-icon"> -->
                    <div class="appearance-text">Appearance</div>
                </div>
                <div class="leftSide">
                    <!-- <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/35894e52a51ce94bbc95f50554ca5f4aee346ed001362678cecc18acc2d2ab97?apiKey=72257b775bae4669922439278ecc9058&" alt="Settings" class="settings-icon"> -->
                    <div class="settings-text">Settings</div>
                </div>
                <div class="leftSide">
                    <!-- <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/a07c8f9f0f96c96c7146ba172d41f352b708ce65bd97f7e7a265fb69b1e2e7c2?apiKey=72257b775bae4669922439278ecc9058&" alt="Users" class="user-icon"> -->
                    <div class="user-text">Users</div>
                </div>
                <div class="leftSide">
                    <!-- <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/32b951e81ef17f77875adf8d6eaea1412b006463c635f29db04d981312d77de5?apiKey=72257b775bae4669922439278ecc9058&" alt="Tools" class="tools-icon"> -->
                    <div class="tools-text">Tools</div>
                </div>
            </nav>
            <main class="section">
                <?php include $this->view;?>
            </main>
        </div>
    </body>
</html>