<?php

namespace App\Http\Livewire\Guest\Peraturan\Chart;

use App\Models\Peraturan;
use Livewire\Component;

class Tahun extends Component
{

    public $dataBar;
    public $dataCategory;


    public function mount()
    {
        $data = Peraturan::tahun();
        foreach ($data as $item) {
            $category[] = $item;
            $tempDataBarBerlaku[] = Peraturan::where('status','Berlaku')
                ->where('tahun',$item)
                ->count();
            $tempDataBarTidakBerlaku[] = Peraturan::where('status','Tidak Berlaku')
                ->where('tahun',$item)
                ->count();
        }
        $this->dataBar = collect([[
            'name' => 'Permendikbud Masih Berlaku',
            'data' => $tempDataBarBerlaku,
            'stack' => 'berlaku'
        ],[
            'name' => 'Permendikbud Tidak Berlaku',
            'data' => $tempDataBarTidakBerlaku,
            'stack' => 'berlaku'
        ]])->toJson();
        $this->dataCategory = collect($category)->toJson();

    }
    public function render()
    {
        return view('livewire.guest.peraturan.chart.tahun');
    }
}
