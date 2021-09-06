<?php

namespace App\Http\Livewire\Guest\Peraturan;

use App\Http\Livewire\SuperAdmin\Peraturan\AttributePeraturan;
use App\Models\Peraturan;
use Illuminate\Http\Request;
use Livewire\Component;

class View extends Component
{
    use AttributePeraturan;

    public $listAttribute = [
        'judul',
        'subjek_id',
        'tahun',
        'jenis_peraturan_id',
        'status',
        'nomor_peraturan'
    ];

    public function mount(Request $request)
    {
        //search by get
        foreach ($this->listAttribute as $item) {
            if ($request->get($item)) {
                $this->{$item} = $request->get($item);
            }
        }
    }

    public function render()
    {

        $table = Peraturan::when($this->judul, function ($q) {
            $q->where('judul', 'like', '%' . $this->judul . '%');
        })
            ->when($this->tahun, function ($q) {
                $q->where('tahun', $this->tahun);
            })
            ->when($this->subjek_id, function ($q) {
                $q->where('subjek_id', $this->subjek_id);
            })
            ->when($this->jenis_peraturan_id, function ($q) {
                $q->where('jenis_peraturan_id', $this->jenis_peraturan_id);
            })
            ->when($this->nomor_peraturan, function ($q) {
                $q->where('nomor_peraturan', 'like', '%' . $this->nomor_peraturan . '%');
            })
            ->where('is_publish',1)
            ->paginate(10);
        return view('livewire.guest.peraturan.view')->with(compact('table'));
    }


    public function reset(...$properties)
    {
        parent::reset($properties);
    }
}
