<?php

/**
 * Kill Function
 */
include_once('killfunction.php');

$asset_path = get_stylesheet_directory_uri() . '/woan/assets';

/*
*
* Load Functions
*/
function style_custom()
{
    global $asset_path;

    //Bootsrap
    wp_enqueue_style('font-awesome-620', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css', array(), '4.6.0', false);
    // Custom
    wp_enqueue_style('style-custom', "$asset_path/css/style.min.css", array(), time(), false);
}

function script_custom()
{
    global $asset_path;

    //wp_enqueue_script('bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js", array(), '4.6.0', true);

    //JS
    wp_register_script('custom', "$asset_path/js/custom.min.js", array(), time(), true);
    wp_enqueue_script('custom');
}

add_action('wp_print_styles', 'style_custom');
add_action('wp_print_scripts', 'script_custom');
