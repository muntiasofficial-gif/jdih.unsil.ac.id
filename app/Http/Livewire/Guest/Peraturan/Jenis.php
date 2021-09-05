<?php

namespace App\Http\Livewire\Guest\Peraturan;

use App\Models\JenisPeraturan;
use Livewire\Component;

class Jenis extends Component
{
    public function render()
    {
        $data = JenisPeraturan::all();
        return view('livewire.guest.peraturan.jenis')->with(compact('data'));
    }
}
