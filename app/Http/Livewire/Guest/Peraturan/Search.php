<?php

namespace App\Http\Livewire\Guest\Peraturan;

use App\Http\Livewire\SuperAdmin\Peraturan\AttributePeraturan;
use Livewire\Component;

class Search extends Component
{
    use AttributePeraturan;

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.guest.peraturan.search');
    }


    public function reset(...$properties)
    {
        parent::reset($properties);
    }
}
