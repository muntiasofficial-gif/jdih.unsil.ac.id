<?php

namespace App\Http\Livewire\SuperAdmin\DataMaster\Jenis;

use App\Models\JenisPeraturan;
use App\Repository\SuperAdmin\DataMaster\DataMasterInterface;
use Livewire\Component;
use Livewire\WithPagination;

class View extends Component implements DataMasterInterface
{
    use WithPagination;

    public $idJenis;
    public $keterangan;

    public $rules = [
        'keterangan' => 'required',
    ];

    public function render()
    {
        $table = JenisPeraturan::get();

        return view('livewire.super-admin.data-master.jenis.view')
            ->with(compact('table'));
    }

    public function save()
    {
        $data = $this->validate();

        if ($this->idJenis) {
            $pangkat = JenisPeraturan::find($this->idJenis);

            $pangkat->update($data);

            $this->emit('alert', [
                'tipe' => 'success',
                'body' => 'Berhasil diubah'
            ]);
        } else {
            JenisPeraturan::create($data);

            $this->emit('alert', [
                'tipe' => 'success',
                'body' => 'Berhasil di simpan'
            ]);
        }

        $this->keterangan = "";
        $this->idJenis = 0;
    }

    public function edit(int $id)
    {
        $this->idJenis = $id;

        $jenis = JenisPeraturan::findOrFail($id);

        $this->keterangan = $jenis->keterangan;
    }

    public function remove(int $id)
    {
        $jenis = JenisPeraturan::findOrFail($id);

        $jenis->delete();

        $this->emit('alert', [
            'tipe' => 'success',
            'body' => 'Berhasil Dihapus'
        ]);
    }
}