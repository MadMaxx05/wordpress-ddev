<?php

$post_types = glob(TEMPLATE_DIR . '/inc/post-types/*.php');

array_map(static function ($file) {
    require_once($file);
}, array_merge($post_types));
