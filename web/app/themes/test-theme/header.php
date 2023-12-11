<?php

$locations  = get_nav_menu_locations();
$menu_id    = array_key_exists('primary', $locations) ? $locations['primary'] : [];
$menu_items = wp_get_nav_menu_items($menu_id) ?: [];

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?>Nameless</title>
    <?php wp_head(); ?>
</head>

<body <?php body_class('font-inter'); ?>>
    <header class="sticky top-0 bg-white/80 border-b border-black/10 backdrop-blur-lg z-10 transition duration-300">
        <div class="mx-auto p-4 max-w-7xl">
            <div class="flex justify-between items-center">
                <div>
                    <a href="/">
                        <img src="<?php echo TEMPLATE_DIR_URI . '/assets/img/nameless-logo.svg' ?>" alt="Nameless Logo">
                    </a>
                </div>
                <button id="menu-button" class="md:hidden p-2 w-12 h-12 flex flex-col justify-center gap-2 rounded-md hover:bg-black/5 transition">
                    <span class="block w-full h-0.5 bg-[#111111] transition duration-300"></span>
                    <span class="block w-full h-0.5 bg-[#111111] transition duration-300"></span>
                </button>
                <ul class="absolute md:static top-[calc(100%+1px)] -left-full md:translate-x-0 pt-24 px-4 pb-4 md:p-0 w-full h-[calc(100dvh-80px)] md:w-auto md:h-auto bg-white md:bg-transparent flex flex-col items-center gap-7 md:gap-10 md:flex-row transition duration-300">
                    <?php foreach ($menu_items as $item) : ?>
                        <li><a class="text-base text-[#111111] hover:underline" href="<?php echo $item->url ?>"><?php echo $item->title ?></a></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </header>
    <main>