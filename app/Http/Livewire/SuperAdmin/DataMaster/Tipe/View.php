<?php

namespace App\Http\Livewire\SuperAdmin\DataMaster\Tipe;

use App\Models\TipePeraturan;
use App\Repository\SuperAdmin\DataMaster\DataMaster;
use App\Repository\SuperAdmin\DataMaster\DataMasterInterface;
use Livewire\Component;
use Livewire\WithPagination;

class View extends Component implements DataMasterInterface
{
    use WithPagination,DataMaster;
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

        $data = $this->validate();
        if ($this->idTipe){
            $pangkat = \App\Models\TipePeraturan::find($this->idTipe);
            $pangkat->update($data);
            $this->emit('alert', ['tipe' => 'success', 'body' => 'Berhasil diubah']);
        }else{
            \App\Models\TipePeraturan::create($data);
            $this->emit('alert', ['tipe' => 'success', 'body' => 'Berhasil di simpan']);
        }
        $this->keterangan = "";
        $this->idTipe = 0;
        // TODO: Implement save() method.
    }

    public function edit(int $id)
    {
        $data = TipePeraturan::findOrFail($id);
        $this->keterangan = $data->keterangan;
        $this->idTipe = $id;
        // TODO: Implement edit() method.
    }

    public function remove(int $id)
    {
        $data = TipePeraturan::findOrFail($id);
        $data->delete();
        // TODO: Implement remove() method.
    }
}
