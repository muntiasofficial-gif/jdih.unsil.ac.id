<?php
namespace App\Http\Livewire\Guest\Peraturan\Chart;

use App\Models\Peraturan;
use Livewire\Component;

class Lokasi extends Component{
    public $dataPie;

    public function mount()
    {
        $kampus1 = Peraturan::where('lokasi', 'Kampus 1')->count();
        $kampus2 = Peraturan::where('lokasi', 'Kampus 2')->count();
        $lainnya = Peraturan::whereNotIn('lokasi', ['Kampus 1', 'Kampus 2'])
        ->whereNotNull('lokasi')
        ->count();

        $this->dataPie = collect([
        [
            'name' => 'Kampus 1',
            'y' => $kampus1,
        ],
        [
            'name' => 'Kampus 2',
            'y' => $kampus2,
        ],
        [
            'name' => 'Lainnya',
            'y' => $lainnya,
        ],
        ])->toJson();

    }

    // public function render()
    // {
    //     return view('livewire.guest.peraturan.chart.lokasi');
    // }
}