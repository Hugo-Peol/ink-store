<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ArtCard extends Component
{
    public $title;
    public $image;
    public $description;

    public function __construct($title, $image, $description)
    {
        $this->title = $title;
        $this->image = $image;
        $this->description = $description;
    }

    public function render()
    {
        return view('components.art-card');
    }
}
