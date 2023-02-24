<?php

require_once get_template_directory() . "/functions/help-section/init.php";

HelpSectionPostType::init();

add_action('admin_menu', 'register_my_page');
function register_my_page()
{
    add_menu_page('Custom', 'Edycja sekcji', 'edit_others_posts', 'custom_menu', function () {
        echo 'custom page';
    }, 'dashicons-smiley', 6);
};
