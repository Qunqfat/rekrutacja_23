<?php
require_once get_template_directory() . "/functions/global-assets.php";
require_once get_template_directory() . "/functions/custom-posts.php";
add_theme_support('menus');
add_theme_support('post-thumbnails');
function theme_version()
{
    global $theme_version;
    $theme_version = '2402202301';
}
add_action('after_setup_theme', 'theme_version');
