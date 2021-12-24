<?php
/**
 * Bootstrap file
 *
 * Plugin Name:         Custom Gutenberg
 * Description:         Custom gutenberg blocks for site
 * Version:             1.1
 * Requires at least:   5.6
 * Requires PHP:        7.0
 * Author:              misha
 * Author URI:          {AUTHOR_URL}
 * License:             MIT
 * Text Domain:         custom-gutenberg
 *
 * @package     CustomGutenberg
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use CustomGutenberg\Plugin;
use CustomGutenberg\Vendor\Auryn\Injector;
include_once ABSPATH . 'wp-admin/includes/plugin.php';

if ( ! defined( 'custom_gutenberg_DEBUG' ) ) {
	/**
	 * Enable plugin debug mod.
	 */
	define( 'custom_gutenberg_DEBUG', false );
}
/**
 * Path to the plugin root directory.
 */
define( 'custom_gutenberg_PATH', plugin_dir_path( __FILE__ ) );
/**
 * Url to the plugin root directory.
 */
define( 'custom_gutenberg_URL', plugin_dir_url( __FILE__ ) );

define( 'GUTENBERG_CATTITLE', wp_get_theme()['Name'] . ' blocks' );
define( 'GUTENBERG_CATSLUG', wp_get_theme()['Name'] . '-blocks' );

/**
 * Run plugin function.
 *
 * @throws Exception If something went wrong.
 * @since {VERSION}
 *
 */
function run_custom_gutenberg() {
	require_once custom_gutenberg_PATH . 'vendor/autoload.php';

	if (is_admin() && !is_plugin_active( 'advanced-custom-fields-pro-master/acf.php' )) {
		activate_plugin( 'advanced-custom-fields-pro-master/acf.php');
	}
}

add_action( 'plugins_loaded', 'run_custom_gutenberg' );
register_activation_hook( __FILE__, 'custom_gutenberg_activation');

function custom_gutenberg_activation() {
    if (is_admin() && !is_plugin_active( 'advanced-custom-fields-pro-master/acf.php' ) && extension_loaded('zip')) {
        $zip = new ZipArchive;
        if ($zip->open(custom_gutenberg_PATH .'must-use/advanced-custom-fields-pro.zip')) {
	        mkdir(WP_PLUGIN_DIR . '/advanced-custom-fields-pro-master');
            $zip->extractTo(WP_PLUGIN_DIR . '/advanced-custom-fields-pro-master');
        }
    }
}
require_once custom_gutenberg_PATH . '/functions/register-styles-scripts.php';

if (function_exists('acf_register_block_type')) {
    require_once custom_gutenberg_PATH . '/functions/gutenberg_register_blocks.php';
    require_once custom_gutenberg_PATH . '/map/map.php';
}