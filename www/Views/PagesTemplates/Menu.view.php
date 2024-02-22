<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="../../dist/demo.css">
        <title>demo</title>
    </head>
    <body>

        
        <?php

        $slot1 = null;
        $slot2 = null;
        $slot3 = null;
        $slot4 = null;

        $slots = 4 ;

        $json_content = $this->data;
        
        if (isset($json_content["content"])) {
          $content = json_decode($json_content["content"]);
      
          foreach ($content as $key => $value) {
              $$key = $value;
          }
      }
        
        
        echo("<h1>$slot1</h1>");
        echo("<h2>$slot2</h2>");
        echo("<h3>$slot3</h3>");
        echo("<h4>$slot4</h4>");
        ?>
    

    <header class="headerMenu">
    <img src="/images/logos.svg" alt="Logo du restaurant">
  </header>
  <main class="mainMenu">
    <section class="sectionMenu" id="carte">
      <h2>Carte</h2>
	  <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
    </section>
    <div class="flex-container">
      <section class="sectionMenu" id="viande">
        <h2>Viande</h2>
		<img src="/images/CoteDePorc.jpg" alt="Porc">
		<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
      </section>
      <section class="sectionMenu" id="vegetarien">
        <h2>Végétarien</h2>
		<img src="/images/vegetarien.jpg" alt="Logo du restaurant">
		<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
      </section>
      <section class="sectionMenu" id="poisson">
        <h2>Poisson</h2>
		<img src="/images/saumon.jpg" alt="Logo du restaurant">
		<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
      </section>
      <section class="sectionMenu" id="dessert">
        <h2>Dessert</h2>
		<img src="/images/dessert.jpg" >
		<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
      </section>
    </div>
  </main>

    </body>
</html>