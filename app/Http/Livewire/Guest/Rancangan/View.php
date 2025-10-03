<?php

namespace App\Http\Livewire\Guest\Rancangan;

use App\Models\Peraturan;
use Livewire\Component;
use Livewire\WithPagination;

class View extends Component
{
    use WithPagination;

    public $judul, $tahun, $subjek_id, $jenis_peraturan_id, $jenis_draft, $nomor_peraturan;

    public function mount()
    {
        $this->judul = request('judul');
        $this->tahun = request('tahun');
        $this->subjek_id = request('subjek_id');
        $this->jenis_peraturan_id = request('jenis_peraturan_id');
        $this->jenis_draft = request('jenis_draft');
        $this->nomor_peraturan = request('nomor_peraturan');
    }

    public function render()
    {
        $table = Peraturan::where('draft', 1) // Only show draft peraturan
            ->when($this->judul, function ($q) {
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
            ->when(is_numeric($this->jenis_draft), function ($q) {
                $q->where('jenis_draft', $this->jenis_draft);
            })
            ->when($this->nomor_peraturan, function ($q) {
                $q->where('nomor_peraturan', 'like', '%' . $this->nomor_peraturan . '%');
            })
            ->latest()
            ->paginate(10);
        
        return view('livewire.guest.rancangan.view')
            ->with(compact('table'));
    }

    public function view($id)
    {
        return redirect()->route('guest.peraturan.view', ['peraturan_id' => $id]);
    }

    public function reset(...$properties)
    {
        parent::reset($properties);
    }
}
