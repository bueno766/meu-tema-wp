<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?></title>

    <!--Bootstrap CSS / CDN -->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!--Bootstrap CSS / local 
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/lib/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">
        -->

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
    // WordPress 5.2 wp_body_open implementation
    if (function_exists('wp_body_open')) {
        wp_body_open();
    } else {
        do_action('wp_body_open');
    }
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" role="navigation">
        <div class="container">
            <a class="navbar-brand" id="logo" href="<?php bloginfo('url'); ?>">
                <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

                if (has_custom_logo()) {
                    echo '<img src="' . esc_url($logo[0]) . '" class="img-fluid">';
                } else {
                    echo '<h1>' . get_bloginfo('name') . '</h1>';
                    echo '<p class="lead">' . get_bloginfo('description') . '</p>';
                }
                ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="nav navbar-collapse ml-auto text-uppercase">
                <?php
                wp_nav_menu(array(
                    'theme_location'    => 'principal',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse justify-content-end',
                    'container_id'      => 'navbarResponsive',
                    'menu_class'        => 'nav navbar-nav',
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => new WP_Bootstrap_Navwalker(),
                ));
                ?>
            </ul>
        </div>
        <!---container--->
    </nav>

    <div class="pag">