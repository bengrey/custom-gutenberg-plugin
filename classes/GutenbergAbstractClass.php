<?php

namespace CustomGutenberg;

abstract class GutenbergAbstractClass
{
    public $title;
    public $name;
    public $description;
    private $icon;
    private $category;
    private $keywords;
    private $post_types;
    private $mode;
    private $align;
    private $align_text;
    private $align_content;
    private $render_callback;
    private $supports;
    private $allowed_blocks;

    abstract protected function fields();

    /**
     * A function that returns path to the template or raw html
     * @return mixed
     */
    abstract public function render();

    private function styles()
    {

    }

    private function scripts()
    {

    }

    private function enqueueAssets()
    {
        $this->styles();
        $this->scripts();
    }

    private function example() {

    }
}