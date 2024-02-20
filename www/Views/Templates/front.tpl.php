<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<link rel="stylesheet" type="text/css" href="dist/css/style.css" />
		<script src="dist/js/main.js"></script>
        <title>Front</title>
    </head>
    <body>
    <h1>Template du front</h1>
    <nav class="navbar">
		<div class="container">
               <a href="#" class="navbar_title">Navbar</a>
               <button class="navbar_toggle_button" data-target="#content">
                    menu
               </button>
               <div class="navbar_toggle_content" id="content">
                    <ul>
                         <li>
                              <a href="#" class="active">Home</a>
                         </li>
                         <li>
                              <a href="#">Features</a>
                         </li>
                         <li>
                              <a href="#">Pricing</a>
                         </li>
                         <li>
                              <a href="#" class="disabled">Disabled</a>
                         </li>
                    </ul>
                    <form>
                         <input type="text" placeholder="Search" />
                         <button class="button button-outline">Search</button>
                    </form>
               </div>
	     </div>
	</nav>
        
        <?php include $this->view;?>
    </body>
</html>