<?php

namespace App\Exports;

use App\Http\Livewire\SuperAdmin\Peraturan\AttributeUploadExcel;
use App\Models\Peraturan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExampleImportPeraturan implements FromCollection,WithHeadings
{
    use AttributeUploadExcel;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect([[
        ]]);
    }

    public function array(): array
    {
        return [
            'test'
        ];
    }

    public function headings(): array
    {
        return $this->attribute;
    }
}
