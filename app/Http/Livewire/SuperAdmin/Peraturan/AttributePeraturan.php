<?php


namespace App\Http\Livewire\SuperAdmin\Peraturan;


use App\Models\Peraturan;

trait AttributePeraturan
{
    public $document;

    public $judul,
        $badan,
        $nomor_peraturan,
        $tempat_penetapan,
        $tahun,
        $tanggal_ditetapkan,
        $tanggal_diundangkan,
        $status,
        $bahasa,
        $lokasi,
        $subjek_id,
        $tipe_peraturan_id,
        $jenis_peraturan_id,
        $document_peraturan_id,
        $is_publish;

    public function mountToAttribute(Peraturan $peraturan)
    {
        $this->judul = $peraturan->judul;
        $this->tipe_peraturan_id = $peraturan->tipe_peraturan_id;
        $this->subjek_id = $peraturan->subjek_id;
        $this->jenis_peraturan_id = $peraturan->jenis_peraturan_id;
        $this->status = $peraturan->status;
        $this->badan = $peraturan->badan;
        $this->nomor_peraturan = $peraturan->nomor_peraturan;
        $this->tempat_penetapan = $peraturan->tempat_penetapan;
        $this->tahun = $peraturan->tahun;
        $this->tanggal_ditetapkan = $peraturan->tanggal_ditetapkan;
        $this->tanggal_diundangkan = $peraturan->tanggal_diundangkan;
        $this->bahasa = $peraturan->bahasa;
        $this->lokasi = $peraturan->lokasi;
        $this->is_publish = $peraturan->is_publish;
        $this->document_peraturan_id = $peraturan->document_peraturan_id;
        $this->document = asset('storage/' . $peraturan->dokumen->path);
    }

}
