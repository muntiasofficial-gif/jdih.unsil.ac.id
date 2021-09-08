<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DefaultInput extends Component
{

    public $nama;
    public $type;
    public $title;
    public $placeholder;
    public $accept;
    public $change;
    public $readonly;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($nama,$type,$title,$placeholder = false,$accept = false,$change = false,$readonly = false)
    {
        $this->nama = $nama;
        $this->type = $type;
        $this->title = $title;
        $this->placeholder = $placeholder;
        $this->accept = $accept;
        $this->change = $change;
        $this->readonly = $readonly;
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
