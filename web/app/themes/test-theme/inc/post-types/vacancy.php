<?php

function vacancy_post_type()
{
    $labels = [
        'name'               => _x('Vacancies', 'vacancy'),
        'singular_name'      => _x('Vacancy', 'vacancy'),
        'add_new'            => _x('Add New', 'vacancy'),
        'add_new_item'       => __('Add New Vacancy'),
        'edit_item'          => __('Edit Vacancy'),
        'new_item'           => __('New Vacancy'),
        'all_items'          => __('All Vacancies'),
        'view_item'          => __('View Vacancy'),
        'search_items'       => __('Search Vacancies'),
        'not_found'          => __('No vacancies found'),
        'not_found_in_trash' => __('No vacancies found in the Trash'),
        'menu_name'          => 'Vacancies'
    ];
    $args = [
        'labels'                => $labels,
        'description'           => 'Holds our beautiful vacancies',
        'public'                => true,
        'hierarchical'          => false,
        'show_ui'               => true,
        'show_in_nav_menus'     => true,
        'supports'              => ['title', 'editor', 'thumbnail'],
        'has_archive'           => false,
        'taxonomies'            => ['vacancies-categories'],
        'rewrite'               => true,
        'query_var'             => true,
        'menu_position'         => null,
        'menu_icon'             => 'dashicons-id-alt',
        'show_in_rest'          => true,
        'rest_base'             => 'vacancies',
        'rest_controller_class' => 'WP_REST_Posts_Controller',

    ];
    register_post_type('vacancy', $args);
}
add_action('init', 'vacancy_post_type');

function vacancy_updated_messages($messages)
{
    global $post, $post_ID;
    $messages['vacancy'] = [
        0 => '',
        1 => sprintf(__('Vacancy updated. <a href="%s">View vacancy</a>'), esc_url(get_permalink($post_ID))),
        2 => __('Custom field updated.'),
        3 => __('Custom field deleted.'),
        4 => __('Vacancy updated.'),
        5 => isset($_GET['revision']) ? sprintf(__('Vacancy restored to revision from %s'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
        6 => sprintf(__('Vacancy published. <a href="%s">View vacancy</a>'), esc_url(get_permalink($post_ID))),
        7 => __('Vacancy saved.'),
        8 => sprintf(__('Vacancy submitted. <a target="_blank" href="%s">Preview vacancy</a>'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
        9 => sprintf(__('Vacancy scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview vacancy</a>'), date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
        10 => sprintf(__('Vacancy draft updated. <a target="_blank" href="%s">Preview vacancy</a>'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
    ];
    return $messages;
}
add_filter('post_updated_messages', 'vacancy_updated_messages');
