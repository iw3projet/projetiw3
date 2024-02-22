<!DOCTYPE html>
<html>

<head>
    <title>
        <?php $slot1 ?>
    </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
</head>

<body>

    <?php

    $slot1 = null;
    $slot2 = null;
    $slot3 = null;
    $slot4 = null;
    $slot5 = null;
    $slot6 = null;
    $slot7 = null;
    $slot8 = null;
    $slot9 = null;
    $slot10 = null;
    $slot11 = null;

    $slots = 11;
    
    $json_content = $this->data;

    if (isset($json_content["content"])) {
        $content = json_decode($json_content["content"]);
    
        foreach ($content as $key => $value) {
            $$key = $value;
        }
    }
    

    ?>
    <section>
        <div class="banner banner-text" style="background-image: url('/images/fond.jpg')">
            <p>
                <?php
                if ($slot1 != "") {
                    echo $slot1;
                } else {
                    echo "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras
                            ullamcorper nulla a ipsum imperdiet, ac porttitor dui sagittis.";
                }
                ?>
            </p>
        </div>
    </section>

    <section class="section3">
        <div class="container">
            <h1>
                <?php if ($slot2 != "") {
                    echo $slot2;
                } else {
                    echo "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras
                            ullamcorper nulla a ipsum imperdiet, ac porttitor dui sagittis.";
                } ?>
            </h1>
            <ul class="offer-list">
                <li>
                    <article class="offer">
                        <img src="/images/restau2.jpg">
                    </article>
                </li>
                <li>
                    <article class="textdescriptif">
                        <small>
                            <?php if ($slot3 != "") {
                                echo ($slot3);
                            } else {
                                echo ("Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                            Vero praesentium optio autem?. <br />Lorem ipsum dolor, sit amet 
                            consectetur adipisicing elit. Facere doloremque nemo totam. Vel veritatis 
                            sed repudiandae ad ullam aliquam aliquid, assumenda doloribus voluptate, 
                            ducimus, corporis sequi molestiae maiores dolor distinctio!.");
                            } ?>
                        </small>
                    </article>
                </li>
            </ul>
        </div>
    </section>

    <section class="section2">
        <div class="container">
            <h1>
                <?php if ($slot4 != "") {
                    echo $slot4;
                } else {
                    echo "Lorem ipsum dolor sit amet.&nbsp;";
                } ?>
            </h1>
            <ul class="benefit-list">
                <li>
                    <article class="benefit">
                        <img src="images/homard.jpg" alt="benefit1" />
                        <h1>
                            <?php if ($slot5 != "") {
                                echo $slot5;
                            } else {
                                echo "Lorem ipsum dolor sit.";
                                echo "TESSSSSSSSSSSSSSSSSSSSSSSSSTTTT.";
                            } ?>
                        </h1>
                        <h2>
                            <?php if ($slot6 != "") {
                                echo $slot6;
                            } else {
                                echo "Lorem, ipsum dolor sit amet consectetur adipisicing.";
                            } ?>
                        </h2>
                    </article>
                </li>
                <li>
                    <article class="benefit">
                        <img src="images/escargot.jpg" alt="benefit2" />
                        <h1>
                            <?php if ($slot7 != "") {
                                echo $slot7;
                            } else {
                                echo "Lorem ipsum dolor sit.";
                            } ?>
                        </h1>
                        <h2>
                            <?php if ($slot8 != "") {
                                echo $slot8;
                            } else {
                                echo "Lorem ipsum dolor sit amet consectetur.";
                            } ?>
                        </h2>
                    </article>
                </li>
                <li>
                    <article class="benefit">
                        <img src="images/saumon.jpg" alt="benefit3" />
                        <h1>
                            <?php if ($slot9 != "") {
                                echo $slot9;
                            } else {
                                echo "Lorem ipsum dolor sit.";
                            } ?>
                        </h1>
                        <h2>
                            <?php if ($slot10 != "") {
                                echo $slot10;
                            } else {
                                echo "Lorem ipsum dolor sit.";
                            } ?>
                        </h2>
                    </article>
                </li>
                <li>
                    <article class="benefit">
                        <img src="images/dessert.jpg" alt="benefit4" />
                        <h1>
                            <?php if ($slot11 != "") {
                                echo $slot11;
                            } else {
                                echo "Lorem ipsum dolor sit.";
                            } ?>
                        </h1>
                        <h2>
                            <?php if ($slot11 != "") {
                                echo $slot11;
                            } else {
                                echo "Lorem ipsum dolor sit.";
                            } ?>
                        </h2>
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