<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TextArea extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $nama;
    public $type;
    public $title;
    public $readonly;

    public function __construct($nama, $title,$readonly=  false)
    {
        $this->nama = $nama;
        $this->title = $title;
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
        return view('components.text-area');
    }
}
