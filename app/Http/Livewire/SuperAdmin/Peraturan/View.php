<?php

namespace App\Http\Livewire\SuperAdmin\Peraturan;

use App\Exports\ExampleImportPeraturan;
use App\Imports\ImportPeraturan;
use App\Models\Peraturan;
use App\Repository\SuperAdmin\Peraturan\PeraturanRepo;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Excel;

class View extends Component
{
    public $judul, $tahun, $subjek_id, $jenis_peraturan_id, $status, $nomor_peraturan;
    use WithPagination,AttributePeraturan;

    public function download()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new ImportPeraturan(),'example-import-peraturan.xlsx');
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
