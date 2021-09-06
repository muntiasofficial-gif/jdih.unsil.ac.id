<?php

namespace App\Http\Livewire\Guest\Peraturan\Chart;

use App\Models\Peraturan;
use Livewire\Component;

class TahunWithoutStatus extends Component
{

    public $dataBar;
    public $dataCategory;

    public function mount()
    {
        $data = Peraturan::tahun();
        foreach ($data as $item) {
            $category[] = $item;
            $tempDataBar[] = Peraturan::where('tahun', $item)
                ->count();
        }
        $this->dataBar = collect($tempDataBar)->toJson();
        $this->dataCategory = collect($category)->toJson();

    }

    public function render()
    {
        return view('livewire.guest.peraturan.chart.tahun-without-status');
    }
}
