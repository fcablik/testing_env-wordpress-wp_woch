<!DOCTYPE html>
<html lang="en"> 
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog Site Template">
    <meta name="author" content="wochdev.com">
    <link rel="shortcut icon" href="/wp-content/themes/woch/assets/images/logo.png"> 

	<?php
	    wp_head();
	?>

</head> 
 
<body>

    <header class="header-main d-flex sticky-top">

        <a href="/woch" class="d-flex align-items-center col-md-6">
            <?php
                if(function_exists('the_custom_logo'))
                {
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo           = wp_get_attachment_image_src($custom_logo_id, 'full');
                }
            ?>
            <img class="logo" height="50" src="<?php echo $logo[0] ?>" alt="logo">
        </a>

        <?php
            wp_nav_menu(
                [
                    'menu'           => 'primary',
                    'container'      => '',
                    'theme_location' => 'primary',
                    'items_wrap'     => '<ul class="nav nav-lg">%3$s</ul>',

                ]
            );
        ?>

        <!-- //!TODO: burger-mobile-menu? -->
        <div class="body-burger">

            <input type="checkbox" id="checkbox2" class="checkbox2 hide">
            <label for="checkbox2">
                <div class="hamburger hamburger2">
                    <span class="bar bar1"></span>
                    <span class="bar bar2"></span>
                    <span class="bar bar3"></span>
                    <span class="bar bar4"></span>
                </div>
            </label>

        </div>
        <div class="modal hide">
            <?php
                wp_nav_menu(
                    [
                        'menu'           => 'primary',
                        'container'      => '',
                        'theme_location' => 'primary',
                        'items_wrap'     => '<ul class="nav nav-sm">%3$s</ul>',

                    ]
                );
            ?>
        </div>

    </header>

    <?php
        // sidebar widget
        // dynamic_sidebar('sidebar-1');
    ?>
    <?php
        // www name
        // echo get_bloginfo('name');
    ?>

    <div class="page-title">
        <div class="container">
            <!-- ! consider fixed title (//dynamic atm.) -->
            <h1 class="heading">
                <?php
                    the_title();
                ?>
            </h1>
        </div>
    </div>

    <div class="container">
        <div class="main-wrapper">
