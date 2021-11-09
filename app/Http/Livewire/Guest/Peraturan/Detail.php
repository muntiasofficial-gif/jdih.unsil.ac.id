<?php

namespace App\Http\Livewire\Guest\Peraturan;

use App\Http\Livewire\SuperAdmin\Peraturan\AttributePeraturan;
use App\Models\Document;
use App\Models\Peraturan;
use App\Repository\SuperAdmin\Peraturan\PeraturanRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Detail extends Component
{
    use AttributePeraturan;

    public $peraturan_id;
    public $child;
    public $parent;

    public function render()
    {
        return view('livewire.guest.peraturan.detail');
    }

    public function mount(Request $request)
    {
        if ($request->peraturan_id) {
            $peraturanRepo = new PeraturanRepo();
            $peraturan = $peraturanRepo->getById($request->peraturan_id);
            $this->child = $peraturan->allChild;
            $this->parent = $peraturan->allParent;
            $this->peraturan_id = $request->peraturan_id;
            $this->mountToAttribute($peraturan);
        }
    }

    public function addCount()
    {
        $peraturan = Peraturan::findOrFail($this->peraturan_id);
        if ($peraturan->count_download == null) {
            $peraturan->update(['count_download' => 1]);
        } else {
            $peraturan->increment('count_download');
        }
    }

    public function unduh()
    {
        return Storage::download(Document::find($this->document_peraturan_id)->path, $this->judul . '.pdf');
    }
}
