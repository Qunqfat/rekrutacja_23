<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test_v1</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Mulish:wght@300;400;600;700&family=Raleway&display=swap"
        rel="stylesheet">
    <?php wp_head(); ?>
</head>
<?php
$theme_uri =  get_template_directory_uri();
    ?>

<body>
    <header>
        <div class="container">
            <div class="nav-wrapper">
                <div class="logo-wrapper"><img
                        src="<?php echo $theme_uri . '/assets/images/logo-white.png'?>"
                        alt="dsad">
                </div>
                <nav class="menu-top">
                    <ul class="menu-list">
                        <li class="menu-list-item"><a href="#">Strona Główna</a></li>
                        <li class="menu-list-item"><a href="#">Blog</a></li>
                        <li class="menu-list-item"><a href="#">Kontakt</a></li>
                        <li class="menu-list-item"><a href="#">Pobierz NDA</a></li>
                    </ul>
                </nav>
                <div class="menu-top-mobile">
                    <span class="burger-top"></span>
                    <span class="burger-mid"></span>
                    <span class="burger-bot"></span>
                </div>
            </div>
        </div>
    </header>
    <section class="bg-gradient">
        <div class="hero-section container">
            <div class="content">
                <h1 class="hero-title white-txt">Experience you can trust</h1>
                <p class="hero-text">From year to year we strive to invent the most innovative technology that
                    is used
                    by
                    both small enterprises and space enterprises.</p>
                <div class="hero-place">
                    <button class="white-txt btn-blue">Placeholder</button>
                    <div class="phone white-txt">
                        <p>+48 023 492 483</p>
                    </div>
                </div>
            </div>
            <div class="hero-img">
                <img src="<?php echo $theme_uri . '/assets/images/hero.png'?>"
                    alt="dsad">
            </div>
        </div>
    </section>