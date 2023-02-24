<?php

class HelpSectionPostType
{
    const POST_NAME = "kg_help_section";
    public static function init(): void
    {
        add_action('init', fn () => self::functions_init_help_section());
    }
    private static function functions_init_help_section()
    {
        require_once get_template_directory() . "/functions/help-section/help-section.php";
        require_once get_template_directory() . "/functions/help-section/meta-box.php";

        add_help_section_post_type(self::POST_NAME);
    }
}
