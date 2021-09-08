<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportPeraturan implements ToCollection, WithStartRow, WithValidation
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
//        foreach ($collection as $index => $item) {
//            $tempColumn = [];
//            foreach ($item as $key => $i) {
//                if ($key == "tanggal_ditetapkan_dd_mm_yyyy" || $key == 'tanggal_diundangkan_dd_mm_yyyy') {
//                    $tempColumn[] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($i);
//                } else {
//                    $tempColumn[] = $i;
//                }
//            }
//            $tempRow[] = $tempColumn;
//        }
//        return $tempRow;
        //
    }

    public function startRow(): int
    {
        return 2;
    }

    public function rules(): array
    {
    }
}
