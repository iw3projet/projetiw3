<!DOCTYPE html>
<html>
	<head>
		<title><? $slot1 ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<script src="dist/js/main.js"></script>
	</head>
	<body>

            <?php

                $slot1 = null;
                $slot2 = null;
                $slot3 = null;

                $slots = 3 ;

                $json_content = $this->data;
                $content = json_decode($json_content["content"]);

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

        <section>
			<!-- <h1>Image de fond</h1>
			<hr /> -->
			<!-- <div
				class="banner"
				style="background-image: url('/images/fond.jpg')"></div>
			<br /> -->
			<div
				class="banner banner-text"
				style="background-image: url('/images/fond.jpg')">
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras
					ullamcorper nulla a ipsum imperdiet, ac porttitor dui sagittis.
				</p>
			</div>
		</section>

        <section>
			<h1 id="menu">Menu</h1>
			<hr />
			<article class="card card-full">
				<img src="/images/poulet.jpg" />
				<h1>Menu Titre</h1>
				<p>
					Some quick example text to build on the card title and make up the
					bulk of the card's content.
				</p>
				<a href="#" class="button button-primary button-sm">Button</a>
			</article>

			<article class="card">
				<img src="/images/CoteDePorc.jpg" />
				<h1>Menu title</h1>
				<p>
					Some quick example text to build on the card title and make up the
					bulk of the card's content.
				</p>
				<a href="#" class="button button-primary button-sm">Button</a>
			</article>

            <article class="card card-full">
				<img src="/images/homard.jpg" />
				<h1>Menu Titre</h1>
				<p>
					Some quick example text to build on the card title and make up the
					bulk of the card's content.
				</p>
				<a href="#" class="button button-primary button-sm">Button</a>
			</article>
		</section>

        <section>
			<h1>.slider</h1>
			<hr />
			<div class="slider" data-width="200" data-height="400" data-options="{}">
				<img src="/images/image1.jpg" />
				<img src="/images/image2.jpg" />
				<img src="/images/image3.jpg" />
				<img src="/images/image4.jpg" />
				<img src="/images/image5.jpg" />
				<img src="/images/image6.jpg" />
			</div>
		</section>

        <footer class="site-footer">
			<div class="container">
				<nav>
					<ul>
						<li><a href="#">Légal</a></li>
						<li><a href="#">Cookies</a></li>
						<li><a href="#">À propos des pubs</a></li>
					</ul>
				</nav>
				<small>© 2023 Spotify AB</small>
			</div>
		</footer>

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



