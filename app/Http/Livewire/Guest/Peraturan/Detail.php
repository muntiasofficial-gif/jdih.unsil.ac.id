<?php

namespace App\Http\Livewire\Guest\Peraturan;

use App\Http\Livewire\SuperAdmin\Peraturan\AttributePeraturan;
use App\Repository\SuperAdmin\Peraturan\PeraturanRepo;
use Illuminate\Http\Request;
use Livewire\Component;

class Detail extends Component
{
    use AttributePeraturan;

    public $peraturan_id;

    public function render()
    {
        return view('livewire.guest.peraturan.detail');
    }

    public function mount(Request $request)
    {
        if ($request->peraturan_id) {
            $peraturanRepo = new PeraturanRepo();
            $peraturan = $peraturanRepo->getById($request->peraturan_id);
            $this->peraturan_id = $request->peraturan_id;
            $this->mountToAttribute($peraturan);
        }
    }
}
