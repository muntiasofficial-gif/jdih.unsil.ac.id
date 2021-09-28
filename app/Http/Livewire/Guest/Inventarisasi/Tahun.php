<?php

namespace App\Http\Livewire\Guest\Inventarisasi;

use App\Models\JenisPeraturan;
use App\Models\Peraturan;
use Livewire\Component;

class Tahun extends Component
{
    public $data;
    public $header = [
        'JENIS',
        'STATUS'
    ];

    public function mount()
    {
        $tahun = Peraturan::tahun();
        foreach ($tahun as $item) {
            $this->header[] = $item;
        }
        $result = [];
        foreach (JenisPeraturan::all() as $item) {
            foreach (Peraturan::status() as $status) {
                $temp[0] = $item->keterangan;
                $temp[1] = $status;
                foreach ($tahun as $key_tahun => $item_tahun) {
                    $temp[$key_tahun + 1] = Peraturan::where('tahun', $item_tahun)
                        ->where('jenis_peraturan_id', $item->id)
                        ->where('status', $status)
                        ->count();
                }
                $result[] = $temp;
            }
        }
        $this->data = $result;

    }

    public function render()
    {
        return view('livewire.guest.inventarisasi.tahun');
    }
}
