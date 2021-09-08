<?php

namespace App\Http\Livewire\Guest\Peraturan\Chart;

use App\Models\Peraturan;
use Livewire\Component;

class Publish extends Component
{
    public $dataPie;

    public function mount()
    {
        $total = Peraturan::all()->count();
        $temp[] = [
            'name' => 'Peraturan Tidak di Publish',
            'y' => Peraturan::where('is_publish', 1)->count(),
        ];
        $temp[] = [
            'name' => 'Peraturan Publish',
            'y' => Peraturan::where('is_publish', 0)->count(),
        ];
        $this->dataPie = collect($temp)->toJson();
    }

    public function render()
    {
        return view('livewire.guest.peraturan.chart.publish');
    }
}
