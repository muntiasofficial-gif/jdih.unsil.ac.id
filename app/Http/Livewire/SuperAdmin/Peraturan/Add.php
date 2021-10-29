<?php

namespace App\Http\Livewire\SuperAdmin\Peraturan;

use App\Models\Document;
use App\Models\Peraturan;
use App\Repository\SuperAdmin\Peraturan\PeraturanRepo;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;

class Add extends Component
{
    use WithFileUploads, AttributePeraturan;

    public $peraturan_id = null;
    public $document;
    public $rules = [
        'judul' => 'required',
        'badan' => 'required',
        'nomor_peraturan' => 'required',
        'tempat_penetapan' => 'required',
        'tahun' => 'required',
        'tanggal_ditetapkan' => 'required',
        'tanggal_diundangkan' => 'required',
        'status' => 'required',
        'bahasa' => 'required',
        'subjek_id' => 'required',
        'tipe_peraturan_id' => 'required',
        'jenis_peraturan_id' => 'required',
        'is_publish' => 'required',
        'lokasi' => 'required',
        'document' => 'required|file|mimes:pdf',
    ];

    public function mount(Request $request)
    {
        if ($request->peraturan_id) {
            $peraturanRepo = new PeraturanRepo();
            $peraturan = $peraturanRepo->getById($request->peraturan_id);
            $this->peraturan_id = $request->peraturan_id;
            $this->mountToAttribute($peraturan);
        }

    }

    public function render()
    {
        return view('livewire.super-admin.peraturan.add');
    }

    public function save(PeraturanRepo $peraturanRepo)
    {
        if ($this->peraturan_id != null) {
            unset($this->rules['document']);
        } else {
            $this->rules['document'] = 'required|file|mimes:pdf';
        }
        if ($this->status == Peraturan::BERLAKU){
            $this->rules['parent_id'] = 'sometimes|nullable';
        }else{
            unset($this->rules['parent_id']);
        }
        $data = $this->validate();
        $request = \Illuminate\Support\Facades\Request::merge($data);
        if (!$this->peraturan_id) {
            //create new
            $document = Document::create([
                'path' => $this->document->store('doc')
            ]);
            $request->merge([
                'document_peraturan_id' => $document->id,
                'created_by' => auth()->user()->getAuthIdentifier()
            ]);
            $result = $peraturanRepo->create($request);

        } else {
            //update existing
            $request->merge([
                'document_peraturan_id' => $this->document_peraturan_id,
                'created_by' => auth()->user()->getAuthIdentifier()
            ]);
            if ($this->document && !is_string($this->document)) {

                $document = Document::create([
                    'path' => $this->document->store('doc')
                ]);
                $request->merge([
                    'document_peraturan_id' => $document->id,
                ]);
            }
            $result = $peraturanRepo->change($request, $this->peraturan_id);

        }
        if ($result) {
            $this->emit('alert', ['tipe' => 'success', 'body' => 'Peraturan Berhasil ' . ($this->peraturan_id ? "diubah." : "disimpan.")]);
        } else {
            $this->emit('alert', ['tipe' => 'danger', 'body' => 'Peraturan gagal disimpan.']);
        }
        return $this->redirectRoute('peraturan');

    }

    public function upload()
    {
    }
}
