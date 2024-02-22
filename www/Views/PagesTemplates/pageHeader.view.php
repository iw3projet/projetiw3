<!DOCTYPE html>
<html>
	<head>
		<title><? $slot1 ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1" />
	</head>
	<body>

            <?php

                $slot1 = null;
                $slot2 = null;
                $slot3 = null;

                $slots = 3 ;

                $json_content = $this->data;
				if (isset($json_content["content"])) {
					$content = json_decode($json_content["content"]);
				
					foreach ($content as $key => $value) {
						$$key = $value;
					}
				}

        ?>  
	   <header id="header" class="site-header">
			<div class="containerHeader">
				<a href="#" class="site-logo">
					<img src="/images/logos.svg" alt="Logo" />
				</a>
				<nav>
					<ul>
						<li><a href="#">Accueil</a></li>
						<li><a href="#">A propos</a></li>
						<li><a href="#menu">Menu</a></li>
						<li><a>|</a></li>
						<li><a href="/register">S'inscrire</a></li>
						<li><a href="/login">Se connecter</a></li>
					</ul>
				</nav>
			</div>
		</header>
	</body>
    <script>
		window.onload = () => {
			document.querySelector("body").classList.remove("no-transition");
		};
		window.onscroll = () => {
			if (window.scrollY > 0) {
				document.querySelector("#header").classList.add("sticky");
			} else {
				document.querySelector("#header").classList.remove("sticky");
			}
		};
	</script>
</html>