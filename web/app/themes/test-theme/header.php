<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?>Nameless</title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <?php
        $locations = get_nav_menu_locations();
        $menu_id   = array_key_exists('primary', $locations) ? $locations['primary'] : [];

        $menu_items = wp_get_nav_menu_items($menu_id) ?: [];

        ?>
    </header>
    <main class="font-inter">