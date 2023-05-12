<?php
/**
 * Bootstrap file
 *
 * Plugin Name:         Custom Gutenberg
 * Description:         Custom gutenberg blocks for site
 * Version:             2.1
 * Requires at least:   5.5
 * Requires PHP:        7.4
 * Author:              misha
 * Author URI:          {https://github.com/bengrey/}
 * License:             MIT
 * Text Domain:         custom-gutenberg
 *
 * @package     CustomGutenberg
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

define('CG_CATTITLE', 'Test blocks');
define('CG_CATSLUG', 'test-blocks');

include_once ABSPATH . 'wp-admin/includes/plugin.php';

if (!defined('CS_DEBUG')) {
    /**
     * Enable plugin debug mod.
     */
    define('CS_DEBUG', false);
}
/**
 * Path to the plugin root directory.
 */
define('CS_PATH', plugin_dir_path(__FILE__));

/**
 * Load admin styles
 */
define('CS_ADMIN_STYLES', true);

define('CG_BLOCKS', __DIR__ . '/blocks/');

/**
 * Url to the plugin root directory.
 */
define('CS_URL', plugin_dir_url(__FILE__));

if (function_exists('acf_register_block_type')) {
    require_once CS_PATH . 'functions/Default.php';

    require_once CS_PATH . 'functions/Blocks.php';
}

/**
 * Creation of a category
 *
 * @param $categories - current categories
 *
 * @return array
 */
add_filter("block_categories_all", function ($block_categories, $block_editor_context) {
    return array_merge(
        array(
            array(
                'slug' => CG_CATSLUG,
                'title' => CG_CATTITLE,
                'icon' => 'dashicons-format-image',
            ),
        ),
        $block_categories
    );

}, 10, 2);
