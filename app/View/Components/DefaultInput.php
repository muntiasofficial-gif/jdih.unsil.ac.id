<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DefaultInput extends Component
{

    public $nama;
    public $type;
    public $title;
    public $placeholder;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($nama,$type,$title,$placeholder = false)
    {
        $this->nama = $nama;
        $this->type = $type;
        $this->title = $title;
        $this->placeholder = $placeholder;
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.default-input');
    }
}
