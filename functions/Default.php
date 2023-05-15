<?php

class CG_Default
{
    public $name;
    public $title;
    public $renderPath = __DIR__ . '/template.php';
    public $icon;
    public $previewImagePath = __DIR__ . '/screenshot.png';
    private $api_version = 2;

    public function __construct()
    {
        $registerblocktype = array(
            'name' => $this->name, // slug
            'title' => $this->title, // human-readable title
            'category' => CG_CATSLUG,
            'icon' => $this->icon,
            'keywords' => array($this->name),
            'api_version' => $this->api_version,
            "mode" => "preview",
            "render_template" => $this->renderPath,
            'enqueue_style' => $this->styles(),
            'example' => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' => $this->previewImagePath
                    )
                )
            )
        );

        acf_register_block_type($registerblocktype);

        $newfields = [
            'key' => 'group_' . $this->name,
            'title' => $this->title,
            'fields' => $this->fields(),
            'location' => array(
                array(
                    array(
                        'param' => 'block',
                        'operator' => '==',
                        'value' => "acf/$this->name",
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
            'show_in_rest' => 0,
        ];

        acf_add_local_field_group($newfields);
    }

    public function fields()
    {
        return [

        ];
    }

    public function styles()
    {
        //for instance plugin_dir_url(__FILE__) . '/style.css',
        return;
    }
}

?>
