<?php
function add_help_section_post_type($postName)
{
    register_post_type(
        $postName,
        array(
            'labels' => array(
                'name'               => __('Help Section', 'help_section'),
                'singular_name'      => __('Help Section', 'help_section'),
                'all_items'          => __('Help Section', 'help_section'),
                'add_new'            => __('Dodaj nową', 'help_section'),
                'add_new_item'       => __('Dodaj nową pozycję', 'help_section'),
                'edit'               => __('Edytuj', 'help_section'),
                'edit_item'          => __('Edytuj pozycję', 'help_section'),
                'new_item'           => __('Nowa pozycja', 'help_section'),
                'view_item'          => __('Zobacz pozycję', 'help_section'),
                'search_items'       => __('Szukaj pozycji', 'help_section'),
                'not_found'          => __('Nothing found in the Database.', 'help_section'),
                'not_found_in_trash' => __('Nothing found in Trash', 'help_section'),
                'parent_item_colon'  => '',
            ),
            'public'              => false,
            'publicly_queryable'  => true,
            'exclude_from_search' => true,
            'query_var'           => true,
            'show_ui' => true,
            'show_in_menu' => 'custom_menu',
            'rewrite'             => array(
                'slug'       => $postName,
                'with_front' => false,
            ),
            'has_archive'         => false,
            'capability_type'     => 'post',
            'hierarchical'        => false,
            'supports'            => array(
                'title',
                'custom-fields',
                'taxonomy',
                'thumbnail',
                'editor',
                'revisions',
                'excerpt'
            ),
        )
    );
}
