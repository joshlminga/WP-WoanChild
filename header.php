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
        <div class="chld-side-one">
            <!-- Add sticky menu -->
            <div class="chld-logo-top">
                <a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/woan/assets/img/logo_bare.png" /></a>
            </div>

            <div class="chld-logo-side">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/woan/assets/img/logo_side.png" />
            </div>

        </div>

        <div class="chld-main-menu d-none">
            <!-- Add sticky menu -->
            <div class="chld-logo-main">
                <a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/woan/assets/img/transparent.png" /></a>
            </div>

            <!-- Menu -->
            <?php //wp_nav_menu(array('theme_location' => 'left-sidebar-menu',)); 
            ?>
            <ul class="chld-ul-nav">
                <li>
                    <a href="https://2022.midori.ke/woan/" >Home </a>
                </li>
                <li class="has-children">
                    <!--<a href="https://2022.midori.ke/woan/about-us/">About Us </a>-->
                    <a href="#">About Us </a>
                    <ul class="has-children">
                        <li><a href="https://2022.midori.ke/woan/our-core-values/">Our Core Values </a></li>
                        <li><a href="https://2022.midori.ke/woan/financial/">Financial </a></li>
                    </ul>
                </li>
                <li class="has-children">
                    <!--<a href="https://2022.midori.ke/woan/our-support/">Our Support </a>-->
                    <a href="#">Our Support </a>
                    <ul class="has-children">
                        <li><a href="https://2022.midori.ke/woan/shortcodes/member/" >Our Team </a></li>
                        <li><a href="https://2022.midori.ke/woan/family-members/">Family Members </a></li>
                    </ul>
                </li>
                <li class="has-children">
                    <a href="#">Our Impact </a>
                    <ul class="has-children">
                        <li><a href="https://2022.midori.ke/woan/our-events-2022/">Our Events 2022 </a></li>
                        <li><a href="https://2022.midori.ke/woan/our-events-2021/" >Our Events 2021 </a></li>
                        <li><a href="https://2022.midori.ke/woan/our-newsletters/" >Our Newsletters </a></li>
                    </ul>
                </li>
                <li class="has-children">
                    <a href="#" >Our Work </a>
                    <ul class="has-children">
                        <li><a href="#" >Our Projects </a></li>
                        <li><a href="#" >Our Programs </a></li>
                    </ul>
                </li>
                <li><a href="https://2022.midori.ke/woan/contact-us/" class="menu-link  main-menu-link">Contact </a></li>
            </ul>
            
            <!--<ul class="chld-ul-nav" style="">-->
            <!--    <li class=""><a href="https://woan.com/">Home</a></li>-->
            <!--    <li class="has-children">-->
            <!--        <a href="#">About Us-->
                        <!-- has child menu -->
            <!--        </a>-->
                    <!-- Child Menu -->
            <!--        <ul class="has-children">-->
            <!--            <li>-->
            <!--                <a href=""> Level 1</a>-->
            <!--            </li>-->
            <!--            <li>-->
            <!--                <a href=""> Level 1</a>-->
            <!--            </li>-->
            <!--            <li class="has-children">-->
            <!--                <a href="#"> Level 1</a>-->
                            <!-- has child menu -->
                            <!-- <i class="fas fa-angle-right"></i> -->
            <!--                <ul class="has-children">-->
            <!--                    <li><a href="">Level 2</a></li>-->
            <!--                    <li><a href="">Level 2</a></li>-->
            <!--                    <li><a href="">Level 2</a></li>-->
            <!--                </ul>-->
            <!--            </li>-->
            <!--            <li>-->
            <!--                <a href=""> Level 1</a>-->
            <!--            </li>-->
            <!--        </ul>-->
            <!--    </li>-->
            <!--    <li class="">-->
            <!--        <a href="#">Our Support </a>-->
            <!--    </li>-->
            <!--    <li class="has-children">-->
            <!--        <a href="#">Our Impact-->
                        <!-- has child menu -->
            <!--        </a>-->
            <!--        <ul class="has-children">-->
            <!--            <li>-->
            <!--                <a href=""> Level 11</a>-->
            <!--            </li>-->
            <!--            <li>-->
            <!--                <a href=""> Level 11</a>-->
            <!--            </li>-->
            <!--        </ul>-->
            <!--    </li>-->
            <!--    <li class="has-children">-->
            <!--        <a href="#">Our Work-->
                        <!-- has child menu -->
                        <!-- <i class="fas fa-angle-right"></i> -->
            <!--        </a>-->
                    <!-- Child Menu -->
            <!--        <ul class="has-children">-->
            <!--            <li>-->
            <!--                <a href=""> Level 1</a>-->
            <!--            </li>-->
            <!--            <li>-->
            <!--                <a href=""> Level 1</a>-->
            <!--            </li>-->
            <!--            <li class="has-children">-->
            <!--                <a href="#"> Level 1</a>-->
                            <!-- has child menu -->
                            <!-- <i class="fas fa-angle-right"></i> -->
            <!--                <ul class="has-children">-->
            <!--                    <li><a href="">Level 2</a></li>-->
            <!--                    <li><a href="">Level 2</a></li>-->
            <!--                    <li><a href="">Level 2</a></li>-->
            <!--                </ul>-->
            <!--            </li>-->
            <!--            <li>-->
            <!--                <a href=""> Level 1</a>-->
            <!--            </li>-->
            <!--        </ul>-->
            <!--    </li>-->
            <!--    <li class=""><a href="#">Contact</a></li>-->
            <!--</ul>-->
        </div>
        <div class="chld-side-footer">
            <!-- font awsomme nav icon -->
            <div class="chld-nav-icon">
                <i class="fa-solid fa-bars"></i>
            </div>
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