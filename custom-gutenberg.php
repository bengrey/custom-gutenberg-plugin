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
/**
 * Path to the plugin root directory.
 */
define('CG_PATH', plugin_dir_path(__FILE__));

/**
 * Load admin styles
 */
define('CS_ADMIN_STYLES', true);

define('CG_BLOCKS', __DIR__ . '/blocks/');

/**
 * Url to the plugin root directory.
 */
define('CG_URL', plugin_dir_url(__FILE__));

spl_autoload_register('cg_autoloader');

function cg_autoloader($class)
{
    $file = str_replace("\\", "/",__DIR__ ."/blocks/{$class}.php");
    if (file_exists($file)) {
        require_once $file;
    }
}

if (function_exists('acf_register_block_type')) {
    require_once CG_PATH . 'functions/Default.php';

    require_once CG_PATH . 'functions/Blocks.php';
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
