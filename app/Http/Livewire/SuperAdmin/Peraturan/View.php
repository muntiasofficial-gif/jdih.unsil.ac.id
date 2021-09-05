<?php

namespace App\Http\Livewire\SuperAdmin\Peraturan;

use App\Models\Peraturan;
use App\Repository\SuperAdmin\Peraturan\PeraturanRepo;
use Livewire\Component;
use Livewire\WithPagination;

class View extends Component
{
    public $judul, $tahun, $kategori, $jenis_peraturan, $status, $nomor_peraturan;
    use WithPagination;

    public function render()
    {
        $table = Peraturan::when($this->judul, function ($q) {
            $q->where('judul', 'like', '%' . $this->judul . '%');
        })
            ->when($this->tahun, function ($q) {
                $q->where('tahun', $this->tahun);
            })
            ->when($this->kategori, function ($q) {
                $q->where('subjek_id', $this->kategori);
            })
            ->when($this->jenis_peraturan, function ($q) {
                $q->where('jenis_peraturan_id', $this->jenis_peraturan);
            })
            ->when($this->nomor_peraturan, function ($q) {
                $q->where('nomor_peraturan', 'like', '%' . $this->jenis_peraturan . '%');
            })
            ->paginate(10);
        return view('livewire.super-admin.peraturan.view')
            ->with(compact('table'));
    }

    public function remove(PeraturanRepo $peraturanRepo, $peraturan_id)
    {
        $result = $peraturanRepo->remove($peraturan_id);
        if ($result) {
            $this->emit('alert', [
                'tipe' => 'success',
                'body' => 'Peraturan berhasil dihapus.',
            ]);
        }
    }

    public function reset(...$properties)
    {
        parent::reset($properties);
    }
}
