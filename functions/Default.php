<?php

class CG_Default
{
    public $name;
    public $title;
    public $renderPath;
    public $icon;
    public $previewImagePath;
    private $api_version;

    public function __construct()
    {
        $this->renderPath = __DIR__ . '/template.php';
        $this->api_version = 2;

        $registerblocktype = array(
            'name' => 'acf/' . $this->name, // slug
            'title' => $this->title, // human-readable title
            'category' => CG_CATSLUG,
            'icon' => $this->icon,
            'keywords' => array($this->name),
            'api_version' => $this->api_version,
            "acf" => [
                "mode" => "preview",
                "renderTemplate" => $this->renderPath,
                'example' => array(
                    'attributes' => array(
                        'mode' => 'preview',
                        'data' => array(
                            'preview_image_help' => $this->previewImagePath
                        )
                    )
                )
            ],
        );

        acf_register_block_type($registerblocktype);

        $newfields = array(
            'key' => 'group_' . $this->name,
            'title' => $this->title,
            'fields' => apply_filters('custom_gutenberg_fields_' . $this->name, $this->fields()),
            'location' => array(
                array(
                    array(
                        'param' => 'block',
                        'operator' => '==',
                        'value' => 'acf/' . $this->name,
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


        if (apply_filters('custom_gutenberg_fields_' . $this->name, $this->fields())) :
            acf_add_local_field_group($newfields);
        endif;
    }

    public function fields()
    {
        return [

        ];
    }
}

?>
