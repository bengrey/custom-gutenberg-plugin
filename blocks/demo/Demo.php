<?php

namespace CustomGutenberg\Demo;

class Demo
{
    public function __construct()
    {
        $this->name = __('Demo', 'custom-gutenberg'); //human-readable title
        $this->title = 'demo'; //slug
        $this->icon = 'admin-comments';
        $this->category = 'theme';
        $this->previewImagePath = __DIR__ . '/screenshot.png';
        $this->renderPath = __DIR__ . '/template.php';
    }

    public function fields()
    {
        return [
            [
                'type' => 'text',
                'name' => 'title'
            ]
        ];
    }

    public function styles()
    {
        /*TODO: enqueue styles for block*/
    }

    public function scripts()
    {
        /*TODO: enqueue scripts for block */
    }
}
