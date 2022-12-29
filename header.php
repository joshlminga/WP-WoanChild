<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
    <?php if (function_exists('wp_body_open')) {
        wp_body_open();
    } else {
        do_action('wp_body_open');
    } ?>

    <a id="top"></a>
    <?php if (ot_get_option('pre-loading', 2) == 1 || (ot_get_option('pre-loading', 2) == 2 && (is_front_page() || is_page_template('page-templates/front-page.php')))) { ?>
        <div id="pageloader" class="dark-div">
            <div class="loader loader-2"><i></i><i></i><i></i><i></i></div>
        </div>
    <?php }

    $page_title = leaf_global_title();
    ?>
    <div class="chld-menu">
        <!--<div class="chld-side-one">-->
        <!-- Add sticky menu -->
        <!--<div class="chld-logo-top">-->
        <!--    <a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/woan/assets/img/logo_bare.png" /></a>-->
        <!--</div>-->

        <!--<div class="chld-logo-side">-->
        <!--    <img src="<?php echo get_stylesheet_directory_uri(); ?>/woan/assets/img/logo_side.png" />-->
        <!--</div>-->

        <!--</div>-->

        <div class="chld-main-menu d-none">
            <!-- Add sticky menu -->
            <div class="chld-logo-main">
                <a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/woan/assets/img/transparent.png" /></a>
            </div>

            <!-- Menu -->
            <?php wp_nav_menu(array('theme_location' => 'left-sidebar-menu', 'menu_class' => 'chld-ul-nav', 'walker' => new My_Walker_Nav_Menu()));
            ?>

        </div>
        <div class="chld-side-footer">
            <!-- font awsomme nav icon -->
            <div class="chld-nav-icon">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
        <div class="side-image" style="height: 80%;">
            <a href="<?php echo home_url(); ?>">
                <img class="attachment-full size-full" alt="Vertical Image" src="<?php echo get_stylesheet_directory_uri(); ?>/woan/assets/img/logo_side.png">
            </a>
        </div>
    </div>
    <div id="body-wrap">
        <div id="wrap">
            <header>
                <?php get_template_part('templates/header/header', 'navigation'); ?>

                <?php
                $content_head = get_post_meta(get_the_ID(), 'header_content', true);
                if (function_exists('is_shop') && is_shop()) {
                    $content_head = '';
                    $id_ot = get_option('woocommerce_shop_page_id');
                    if ($id_ot != '') {
                        $content_head = get_post_meta($id_ot, 'header_content', true);
                    }
                }
                if (is_home()) {
                    $content_head = '';
                    $id_ot = get_option('page_for_posts');
                    if ($id_ot != '') {
                        $content_head = get_post_meta($id_ot, 'header_content', true);
                    }
                }
                if ($content_head != '') {
                    get_template_part('templates/header/header', 'frontpage');
                }
                ?>
            </header>