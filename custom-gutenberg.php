<?php
/**
 * Bootstrap file
 *
 * Plugin Name:         Custom Gutenberg
 * Description:         Custom gutenberg blocks for site
 * Version:             2.0
 * Requires at least:   7.0
 * Requires PHP:        7.4
 * Author:              misha
 * Author URI:          {https://github.com/bengrey/}
 * License:             MIT
 * Text Domain:         custom-gutenberg
 *
 * @package     CustomGutenberg
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'GUTENBERG_CATTITLE', 'Test blocks' );
define( 'GUTENBERG_CATSLUG', 'test-blocks' );

include_once ABSPATH . 'wp-admin/includes/plugin.php';

if ( ! defined( 'CUSTOM_GUTENBERG_DEBUG' ) ) {
    /**
     * Enable plugin debug mod.
     */
    define( 'CUSTOM_GUTENBERG_DEBUG', false );
}
/**
 * Path to the plugin root directory.
 */
define( 'CUSTOM_GUTENBERG_PATH', plugin_dir_path( __FILE__ ) );

/**
 * Load admin styles
 */
define('CUSTOM_GUTENBERG_ADMIN_STYLES', true);

/**
 * Url to the plugin root directory.
 */
define( 'CUSTOM_GUTENBERG_URL', plugin_dir_url( __FILE__ ) );

require_once CUSTOM_GUTENBERG_PATH . 'vendor/autoload.php';

/**
 * Run plugin function.
 *
 * @throws Exception If something went wrong.
 * @since {VERSION}
 *
 */
function run_custom_gutenberg() {
    require_once CUSTOM_GUTENBERG_PATH . 'vendor/autoload.php';

    if (is_admin() && !is_plugin_active( 'advanced-custom-fields-pro/acf.php' )) {
        activate_plugin( 'advanced-custom-fields-pro-master/acf.php');
    }
}

add_action( 'plugins_loaded', 'run_custom_gutenberg' );
register_activation_hook( __FILE__, 'custom_gutenberg_activation');

function custom_gutenberg_activation() {
    if (is_admin() && !is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) && extension_loaded('zip')) {
        $zip = new ZipArchive;
        if ($zip->open(CUSTOM_GUTENBERG_PATH .'must-use/advanced-custom-fields-pro.zip')) {
            mkdir(WP_PLUGIN_DIR . '/advanced-custom-fields-pro');
            $zip->extractTo(WP_PLUGIN_DIR . '/advanced-custom-fields-pro');
        }
    }
}

if (function_exists('acf_register_block_type')) {
    require_once CUSTOM_GUTENBERG_PATH . '/functions/gutenberg_register_blocks.php';
}
