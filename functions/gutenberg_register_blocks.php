<?php

namespace CustomGutenberg;

/**
 * Creation of a category
 *
 * @param $categories - current categories
 *
 * @return array
 */
add_filter( "block_categories_all", function ($block_categories, $block_editor_context) {
	return array_merge(
		array(
			array(
				'slug'  => GUTENBERG_CATSLUG,
				'title' => GUTENBERG_CATTITLE,
				'icon'  => 'dashicons-format-image',
			),
		),
		$block_categories,
	);

}, 10, 2 );

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

$classes = [
	new Demo\Demo(),
];


foreach ( $classes as $class ) {
	$registerblocktype = array(
		'name'            => $class->name, // slug
		'title'           => $class->title, // human-readable title
		'render_template' => $class->renderPath,
		'category'        => GUTENBERG_CATSLUG,
		'icon'            => $class->icon,
		'keywords'        => array( $class->name ),
		'example'         => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'preview_image_help' => $class->previewImagePath
				)
			)
		)
	);
	acf_register_block_type( $registerblocktype );

	$newfields = array(
		'key'                   => 'group_' . $class->name,
		'title'                 => $class->title,
		'fields'                => apply_filters( 'custom_gutenberg_fields_' . $class->name, $class->fields() ),
		'location'              => array(
			array(
				array(
					'param'    => 'block',
					'operator' => '==',
					'value'    => 'acf/' . $class->name,
				),
			),
		),
		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen'        => '',
		'active'                => true,
		'description'           => '',
	);


	if ( apply_filters( 'custom_gutenberg_fields_' . $class->name, $class->fields() ) ) :
		acf_add_local_field_group( $newfields );
	endif;
}
