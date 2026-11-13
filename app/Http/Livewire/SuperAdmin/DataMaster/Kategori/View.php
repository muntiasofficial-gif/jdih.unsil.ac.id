<?php

namespace App\Http\Livewire\SuperAdmin\DataMaster\Kategori;

use App\Models\Kategori;
use App\Repository\SuperAdmin\DataMaster\DataMaster;
use App\Repository\SuperAdmin\DataMaster\DataMasterInterface;
use Livewire\Component;
use Livewire\WithPagination;

class View extends Component implements DataMasterInterface
{
    use WithPagination,DataMaster;
    public $idKategori;
    public $keterangan;
    public function render()
    {
        $table = Kategori::paginate(10);
        return view('livewire.super-admin.data-master.kategori.view')->with(compact('table'));
    }

    public function save()
    {
        $data = $this->validate();
        if ($this->idKategori){
            $pangkat = \App\Models\Kategori::find($this->idKategori);
            $pangkat->update($data);
            $this->emit('alert', ['tipe' => 'success', 'body' => 'Berhasil diubah']);
        }else{
            \App\Models\Kategori::create($data);
            $this->emit('alert', ['tipe' => 'success', 'body' => 'Berhasil di simpan']);
        }
        $this->keterangan = "";
        $this->idKategori = 0;
        // TODO: Implement save() method.
    }

    public function edit(int $id)
    {
        $data = Kategori::findOrFail($id);
        $this->idKategori = $id;
        $this->keterangan = $data->keterangan;
        // TODO: Implement edit() method.
    }

    public function remove(int $id)
    {
        $data = Kategori::findOrFail($id);
        $data->delete();
         $this->emit('alert', [
            'tipe' => 'success',
            'body' => 'Berhasil Dihapus'
        ]); // TODO: Implement remove() method.
    }
}
