<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title><?php echo ($this->data["title"])?></title>
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<link rel="stylesheet" type="text/css" href="dist/css/style.css" />
		<script src="dist/js/main.js"></script>
        <title>Front</title>
    </head>
    <body>

        <?php include $this->view;?>
    </body>
</html>