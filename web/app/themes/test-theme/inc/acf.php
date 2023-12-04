<?php

$blocks     = glob(TEMPLATE_DIR . '/inc/acf/blocks/*/*.php');
$categories = glob(TEMPLATE_DIR . '/inc/acf/categories.php');
$fields     = glob(TEMPLATE_DIR . '/inc/acf/fields/*.php');
$options    = glob(TEMPLATE_DIR . '/inc/acf/options/*.php');

array_map(static function ($file) {
    require_once($file);
}, array_merge($blocks, $categories, $fields, $options));
