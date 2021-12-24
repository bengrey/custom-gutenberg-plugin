<?php
/**
 * CustomGutenberg Settings
 *
 * @since   {VERSION}
 * @link    {URL}
 * @license GPLv2 or later
 * @package CustomGutenberg
 * @author  {AUTHOR}
 */

namespace CustomGutenberg\Admin;

use CustomGutenberg\Plugin;

/**
 * Class SettingsPage
 *
 * @since   {VERSION}
 *
 * @package CustomGutenberg\Admin
 */
class SettingsPage {

	/**
	 * Init hooks
	 *
	 * @since {VERSION}
	 */
	public function hooks(): void {
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_styles' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
		add_action( 'admin_menu', [ $this, 'add_menu' ] );
	}

	/**
	 * Register the styles for the admin area.
	 *
	 * @since {VERSION}
	 *
	 * @param string $hook_suffix The current admin page.
	 */
	public function enqueue_styles( string $hook_suffix ): void {
		if ( false === strpos( $hook_suffix, Plugin::SLUG ) ) {
			return;
		}

		wp_enqueue_style(
			'custom-gutenberg-settings',
			PLUGIN_NAME_URL . 'assets/build/css/admin/settings.css',
			[],
			Plugin::VERSION,
			'all'
		);
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since {VERSION}
	 *
	 * @param string $hook_suffix The current admin page.
	 */
	public function enqueue_scripts( string $hook_suffix ): void {
		if ( false === strpos( $hook_suffix, Plugin::SLUG ) ) {
			return;
		}

		wp_enqueue_script(
			'custom-gutenberg-settings',
			PLUGIN_NAME_URL . 'assets/build/js/admin/settings.js',
			[ 'jquery' ],
			Plugin::VERSION,
			true
		);
	}

	/**
	 * Add plugin page in WordPress menu.
	 *
	 * @since {VERSION}
	 */
	public function add_menu(): void {
		add_menu_page(
			esc_html__( 'Plugin Name Settings', 'custom-gutenberg' ),
			esc_html__( 'Plugin Name', 'custom-gutenberg' ),
			'manage_options',
			Plugin::SLUG,
			[
				$this,
				'page_options',
			]
		);
	}

	/**
	 * Plugin page callback.
	 *
	 * @since {VERSION}
	 */
	public function page_options(): void {
		require_once PLUGIN_NAME_PATH . 'templates/admin/settings.php';
	}

}
