<?php
/* Demo Block */
gutenberg_block(
	array(
		'name'  => 'demo',
		'title' => 'Demo',
	),
	array(
		array(
			'key' => 'field_demo',
			'label' => 'Demo field',
			'name' => 'field_demo',
			'type' => 'image',
			'instructions' => 'demo instructions',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'id',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
			'translations' => 'copy_once',
		),
	)
);
?>