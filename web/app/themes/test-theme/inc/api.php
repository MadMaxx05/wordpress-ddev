<?php

$apis = glob(TEMPLATE_DIR . '/inc/api/*.php');

array_map(static function ($file) {
    require_once($file);
}, array_merge($apis));
