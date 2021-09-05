<?php

namespace App\Http\Livewire\Guest\Peraturan;

use App\Models\Peraturan;
use Carbon\Carbon;
use Livewire\Component;

class Latest extends Component
{
    public function render()
    {
        $data = Peraturan::where('tahun', Carbon::now()->format('Y'))
            ->latest()
            ->limit(5)
            ->get();
        return view('livewire.guest.peraturan.latest')->with(compact('data'));
    }
}
