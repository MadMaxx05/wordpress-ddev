<?php
define('TEMPLATE_DIR', get_template_directory());
define('TEMPLATE_DIR_URI', get_template_directory_uri());

require_once TEMPLATE_DIR . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(TEMPLATE_DIR);
$dotenv->safeLoad();

define('VITE_SERVER', !empty($_ENV) && !empty($_ENV['VITE_SERVER_PORT']) ? "{$_SERVER['DDEV_PRIMARY_URL']}:{$_ENV['VITE_SERVER_PORT']}" : "{$_SERVER['DDEV_PRIMARY_URL']}:3002");
define('VITE_ENTRY_POINT', !empty($_ENV) && !empty($_ENV['VITE_ENTRY_POINT']) ? $_ENV['VITE_ENTRY_POINT'] : '/source/main.js');
define('VITE_ENVIRONMENT_TYPE', !empty($_ENV) && !empty($_ENV['VITE_ENVIRONMENT_TYPE']) ? $_ENV['VITE_ENVIRONMENT_TYPE'] : 'production');
define('ASSETS_DIR_URI', wp_get_environment_type() === 'development' ? TEMPLATE_DIR_URI . '/source' : TEMPLATE_DIR_URI . '/assets');

require_once TEMPLATE_DIR . '/inc/acf.php';
require_once TEMPLATE_DIR . '/inc/post-types.php';
require_once TEMPLATE_DIR . '/inc/api.php';
require_once TEMPLATE_DIR . '/inc/helpers.php';

if (!function_exists('testtheme_setup')) {
	/**
	 * Sets up theme defaults and registers support for various
	 * WordPress features.
	 */
	function testtheme_setup()
	{
		/**
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support('title-tag');

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			[
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			]
		);

		/*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
		add_theme_support('post-thumbnails');

		/*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
		add_theme_support(
			'html5',
			[
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			]
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for Block Styles.
		add_theme_support('wp-block-styles');

		// Add support for full and wide align images.
		add_theme_support('align-wide');

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		// Add support for custom line height controls.
		add_theme_support('custom-line-height');

		// Add support for experimental link color control.
		add_theme_support('experimental-link-color');

		// Add support for experimental cover block spacing.
		add_theme_support('custom-spacing');

		// Add support for custom logo
		add_theme_support('custom-logo', [
			'height'      => 48,
			'width'       => 147,
			'flex-height' => true,
			'flex-width'  => true,
		]);

		/**
		 * Register custom nav menus
		 */
		register_nav_menus(
			[
				'primary' => esc_html__('Primary menu', 'nameless'),
			]
		);
	}
}

add_action('after_setup_theme', 'testtheme_setup');

/**
 * Enqueue scripts and styles.
 *
 * @return void
 * @throws JsonException
 * @since 1.0.0
 *
 */
function nameless_scripts(): void
{
	$theme_version = wp_get_theme()->get('Version');
	$script_src    = VITE_ENVIRONMENT_TYPE === 'development' ? VITE_SERVER . VITE_ENTRY_POINT : vite_asset('source/main.js');

	wp_enqueue_script('nameless-scripts', $script_src, [], null);
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

	if (VITE_ENVIRONMENT_TYPE !== 'development') {
		wp_enqueue_style('nameless-styles', vite_asset('source/main.js', true), [], null);
	}
}

add_action('wp_enqueue_scripts', 'nameless_scripts');

/**
 * Add type="module" to script tag
 *
 * @param $tag
 * @param $handle
 *
 * @return array|mixed|string|string[]
 */
function nameless_script_module($tag, $handle): mixed
{
	if ($handle !== 'nameless-scripts') {
		return $tag;
	}

	return str_replace('src', 'type="module" src', $tag);
}

add_filter('script_loader_tag', 'nameless_script_module', 10, 2);
