<?php

namespace App\Http\Livewire\SuperAdmin\DataMaster\Tipe;

use App\Models\TipePeraturan;
use App\Repository\SuperAdmin\DataMaster\DataMasterInterface;
use Livewire\Component;
use Livewire\WithPagination;

class View extends Component implements DataMasterInterface
{
    use WithPagination;
    public $idTipe;
    public $keterangan;
    public function render()
    {
        $table = TipePeraturan::paginate(10);
        return view('livewire.super-admin.data-master.tipe.view')
            ->with(compact('table'));
    }

    public function save()
    {
        // TODO: Implement save() method.
    }

    public function edit(int $id)
    {
        // TODO: Implement edit() method.
    }

    public function remove(int $id)
    {
        // TODO: Implement remove() method.
    }
}
