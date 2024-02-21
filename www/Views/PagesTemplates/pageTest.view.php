<!DOCTYPE html>
<html>
	<head>
		<title>Design guide</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<link rel="stylesheet" type="text/css" href="dist/css/style.css" />
		<script src="dist/js/main.js"></script>
		<style>
			body > section {
				margin-bottom: 5rem;
			}
			body > section > section {
				display: flex;
				align-items: center;
				gap: 1rem;
				margin-bottom: 1rem;
			}
			.content {
				height: 2rem;
				background-color: green;
				margin-bottom: 1rem;
			}
			.row {
				margin-bottom: 1rem;
			}
		</style>
	</head>
	<body>
    <section>
			<h1>.navbar</h1>
			<hr />
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
		</section>
		<section>
			<h1>.button</h1>
			<hr />
			<section>
				<a href="#" class="button button-primary button-lg">Button</a>
				<a href="#" class="button button-primary">Button</a>
				<a href="#" class="button button-primary button-sm">Button</a>
				<a href="#" class="buttonConnexion">Connexion</a>
			</section>
			<section>
				<button class="button button-secondary button-lg">Button</button>
				<button href="#" class="button button-secondary">Button</button>
				<button href="#" class="button button-secondary button-sm">
					Button
				</button>
			</section>
			<section>
				<button class="button button-danger button-lg">Button</button>
				<button href="#" class="button button-danger">Button</button>
				<button href="#" class="button button-danger button-sm">Button</button>
			</section>
		</section>
		<section>
			<h1>.banner</h1>
			<hr />
			<div
				class="banner"
				style="background-image: url('/images/fond.jpg')"></div>
			<br />
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
			<h1>.card</h1>
			<hr />
			<article class="card">
				<img src="/images/totoro.jpg" />
				<h1>Card title</h1>
				<p>
					Some quick example text to build on the card title and make up the
					bulk of the card's content.
				</p>
				<a href="#" class="button button-primary button-sm">Button</a>
			</article>

			<article class="card card-full">
				<img src="/images/totoro.jpg" />
				<h1>Card title</h1>
				<p>
					Some quick example text to build on the card title and make up the
					bulk of the card's content.
				</p>
				<a href="#" class="button button-primary button-sm">Button</a>
			</article>
		</section>
		<section>
			<h1>.grid</h1>
			<hr />
			<div class="grid">
				<div class="row">
					<div class="col-2">
						<div class="content"></div>
					</div>
					<div class="col-2">
						<div class="content"></div>
					</div>
					<div class="col-8">
						<div class="content"></div>
					</div>
				</div>
			</div>
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
	</body>
</html>
