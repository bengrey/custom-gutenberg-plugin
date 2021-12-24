<?php
function custom_gutenberg_load_style() {
//	 Add support for editor styles.
	add_theme_support( 'editor-styles' );

//	 Enqueue editor styles.

	add_editor_style( get_template_directory_uri() . '/assets/css/app.min.css' );
	add_editor_style( custom_gutenberg_URL . 'assets/build/css/admin/editor-css.css' );
}

add_action( 'after_setup_theme', 'custom_gutenberg_load_style' );

function my_acf_collor_pallete_script() {
	?>
    <script type="text/javascript">
        (function ($) {

            acf.add_filter('color_picker_args', function (args, $field) {

                args.palettes = ['#EFF7FC', '#3A618D', '#578D3A', '#82AC51', '#f2b24f', '#50575F'];

                return args;
            });

        })(jQuery);
    </script>
	<?php
}

add_action( 'acf/input/admin_footer', 'my_acf_collor_pallete_script' );

add_action( 'admin_enqueue_scripts', function () {
	wp_register_style( 'adminfrontcss', custom_gutenberg_URL . 'assets/build/css/admin/admin.css' );
    wp_enqueue_style('adminfrontcss');
} );