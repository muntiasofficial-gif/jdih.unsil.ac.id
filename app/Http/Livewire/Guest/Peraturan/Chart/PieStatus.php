<?php

namespace App\Http\Livewire\Guest\Peraturan\Chart;

use App\Models\Peraturan;
use Livewire\Component;

class PieStatus extends Component
{
    public $dataPie;

    public function mount()
    {
        $total = Peraturan::all()->count();
        $temp[] = [
            'name' => 'Peraturan [Berlaku]',
            'y' => Peraturan::where('status','Berlaku')->count(),
        ];
        $temp[] = [
            'name' => 'Peraturan [Tidak Berlaku]',
            'y' => Peraturan::where('status','Tidak Berlaku')->count(),
        ];
        $this->dataPie = collect($temp)->toJson();
    }

    public function render()
    {
        return view('livewire.guest.peraturan.chart.pie-status');
    }
}
