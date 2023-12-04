<?php

// This example is registering a option page using ACF. Please see the
// documentation for more information:
// https://www.advancedcustomfields.com/resources/acf_add_options_page/

use Extended\ACF\Fields\Text;
use Extended\ACF\Location;

acf_add_options_page([
    'icon_url' => 'dashicons-admin-site', // https://developer.wordpress.org/resource/dashicons/
    'menu_slug' => 'contact_info',
    'page_title' => 'Contact Info',
    'position' => 21,
]);

register_extended_field_group([
    'title' => 'Contact Info',
    'fields' => [
        Text::make('Address', 'address'),
        Text::make('Mobile Number', 'mobile_number'),
    ],
    'location' => [
        Location::where('options_page', 'contact_info'),
    ],
]);
