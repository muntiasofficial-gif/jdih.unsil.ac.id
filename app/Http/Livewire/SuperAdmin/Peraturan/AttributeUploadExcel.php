<?php


namespace App\Http\Livewire\SuperAdmin\Peraturan;


trait AttributeUploadExcel
{
    public $attribute = [
        'Judul',
        'Tipe Peraturan',
        'Subjek',
        'Jenis',
        'Status (Berlaku / Tidak Berlaku)',
        'T.E.U. Badan/Pengarang',
        'Nomor Peraturan',
        'Tempat Penetapan',
        'Tahun',
        'Tanggal ditetapkan (dd-mm-yyyy)',
        'Tanggal diundangkan (dd-mm-yyyy)',
        'Bahasa',
        'Lokasi',
        'Publish (1 = Ya / 0 = Tidak)'
    ];

}
