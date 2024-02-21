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
                $content = json_decode($json_content["content"]);

                foreach ($content as $key => $value) 
                {   
                    $$key = $value;
                }

        ?>
        <section>
			<div
				class="banner banner-text"
				style="background-image: url('/images/fond.jpg')">
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras
					ullamcorper nulla a ipsum imperdiet, ac porttitor dui sagittis.
				</p>
			</div>
		</section>

        <section class="section3">
				<div class="container">
					<h1>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
					<ul class="offer-list">
						<li>
							<article class="offer">
                              <img src="/images/restau2.jpg">
							</article>
						</li>
						<li>
							<article class="textdescriptif">
                            <small
							>Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                            Vero praesentium optio autem?. <br />Lorem ipsum dolor, sit amet 
                            consectetur adipisicing elit. Facere doloremque nemo totam. Vel veritatis 
                            sed repudiandae ad ullam aliquam aliquid, assumenda doloribus voluptate, 
                            ducimus, corporis sequi molestiae maiores dolor distinctio!.
                            </small>
							</article>
						</li>
					</ul>
				</div>
			</section>
            
            <section class="section2">
				<div class="container">
					<h1>Lorem ipsum dolor sit amet.&nbsp;?</h1>
					<ul class="benefit-list">
						<li>
							<article class="benefit">
								<img src="images/homard.jpg" alt="benefit1" />
								<h1>Lorem ipsum dolor sit.</h1>
								<h2>Lorem, ipsum dolor sit amet consectetur adipisicing.</h2>
							</article>
						</li>
						<li>
							<article class="benefit">
								<img src="images/escargot.jpg" alt="benefit2" />
								<h1>Lorem ipsum dolor sit.</h1>
								<h2>Lorem ipsum dolor sit amet consectetur.</h2>
							</article>
						</li>
						<li>
							<article class="benefit">
								<img src="images/saumon.jpg" alt="benefit3" />
								<h1>Lorem ipsum dolor sit..</h1>
								<h2>Lorem ipsum dolor sit.</h2>
							</article>
						</li>
						<li>
							<article class="benefit">
								<img src="images/dessert.jpg" alt="benefit4" />
								<h1>Lorem ipsum dolor sit.</h1>
								<h2>Lorem ipsum dolor sit</h2>
							</article>
						</li>
					</ul>
				</div>
			</section>

					<footer>

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