<?php


// app/View/Components/Navbar.php

namespace App\View\Components;

use Illuminate\View\Component;

class Navbar extends Component
{
    public $logo;
    public $header;
    public $width;

    /**
     * Create a new component instance.
     *
     * @param  string  $logo
     * @return void
     */
    public function __construct($logo, $header, $width)
    {
        $this->logo = $logo;
        $this->header = $header;
        $this->width = $width;
    }

    public function render()
    {
        return view('components.navbar');
    }
}
