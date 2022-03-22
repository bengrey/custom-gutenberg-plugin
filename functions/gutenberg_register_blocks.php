<?php
function gutenberg_block( $array, $fields = null ) {
	! isset( $array['previewformat'] ) ? ( $array['previewformat'] = '.png' ) : null;
	$preview           = custom_gutenberg_URL . 'blocks/' . $array['name'] . '/screenshot' . $array['previewformat'];
	$registerblocktype = array(
		'name'            => $array['name'], // slug
		'title'           => $array['title'], // human-readable title
		'render_template' => CUSTOM_GUTENBERG_PATH . 'blocks/' . $array['name'] . '/' . $array['name'] . '.php',
		'category'        => GUTENBERG_CATSLUG,
		'icon'            => 'admin-comments',
		'keywords'        => array( $array['name'] ),
		'example'         => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'preview_image_help' => $preview
				)
			)
		)
	);
	acf_register_block_type( $registerblocktype );

	$newfields = array(
		'key' => 'group_'.$array['name'],
		'title' => $array['title'],
		'fields' => $fields,
		'location' => array(
			array(
				array(
					'param' => 'block',
					'operator' => '==',
					'value' => 'acf/'.$array['name'],
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	);


	if ( $fields ) :
		acf_add_local_field_group( $newfields );
	endif;
}

/**
 * Creation of a category
 *
 * @param $categories - current categories
 *
 * @return array
 */
function gutenberg_categories( $categories) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => GUTENBERG_CATSLUG,
				'title' => GUTENBERG_CATTITLE,
				'icon'  => 'dashicons-format-image',
			),
		)
	);
}

add_filter( 'block_categories', 'gutenberg_categories', 10, 2 );

/**
 * function adds required parameters to fields
 *
 * @param array $field settings of the builder field
 *
 * @return array
 */
function gutenberg_prepare_field( array $field ): array {
	switch ( $field['type'] ) {
		case 'image' :
			! $field['return_format'] ?: $field['return_format'] = 'url';
			break;
		case 'repeater' :
			! $field['layout'] ?: $field['layout'] = 'table';
			break;
	}

	$field['key']          = $field['name'];
	$field['translations'] = 'translate';

	return $field;
}

function gutenberg_defs() {

}