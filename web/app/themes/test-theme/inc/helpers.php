<?php

/**
 * Vite manifest parser which returns a path to the entry file
 *
 * @param string $entry
 *
 * @return string
 * @throws JsonException
 */
function vite_asset(string $entry, $is_css = false): string
{
    static $manifest;
    static $manifest_path;

    if (!$manifest_path) {
        $manifest_path = get_theme_file_path('/assets/.vite/manifest.json');
    }

    if (!file_exists($manifest_path)) {
        show_error("Error locating <code{$manifest_path}</code>.", 'File not found');
    }

    if (!$manifest) {
        // @codingStandardsIgnoreLine
        $manifest = json_decode(file_get_contents($manifest_path), true, 512, JSON_THROW_ON_ERROR);
    }

    $entry_file = $is_css ? TEMPLATE_DIR_URI . '/assets/' . current($manifest[$entry]['css']) : TEMPLATE_DIR_URI . '/assets/' . $manifest[$entry]['file'];

    return isset($manifest[$entry])
        ? $entry_file
        : TEMPLATE_DIR_URI . '/' . $entry;
}

/**
 * Renders the error
 *
 * @param $message
 * @param string $subtitle
 * @param string $title
 *
 * @return void
 */
function show_error($message, string $subtitle = '', string $title = ''): void
{
    $error_title   = $title ?: __('Error', 'nameless');
    $error_message = "<h1>{$error_title}<br><small>{$subtitle}</small></h1><p>{$message}</p>";

    if (!is_admin()) {
        wp_die(wp_kses_post($error_message));
    }

    add_action('admin_notices', static function () use ($error_message) {
        echo '<div class="notice notice-error"><p>' . wp_kses_post($error_message) . '</p></div>';
    });
}
