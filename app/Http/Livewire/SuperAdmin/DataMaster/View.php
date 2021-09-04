<?php

namespace App\Http\Livewire\SuperAdmin\DataMaster;

use Livewire\Component;

class View extends Component
{
    public $tab = [
        'jenis'=>'Jenis Peraturan',
        'kategori'=>'Subjek',
        'tipe' => 'Tipe Peraturan',
    ];
    public $tabButton = 'jenis';
    public function render()
    {
        return view('livewire.super-admin.data-master.view');
    }
}
