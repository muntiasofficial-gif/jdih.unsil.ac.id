<?php


namespace App\Http\Livewire\SuperAdmin\Peraturan;


use App\Models\Peraturan;
use App\Models\TipePeraturan;

trait AttributePeraturan
{
    public $document;
    public $jenis_peraturan, $subjek, $tipe_peraturan, $path_document;

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
        $is_publish, $parent_id, $draft, $jenis_draft;

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
        $this->draft = $peraturan->draft ?? 0; // Default to 0 if not set
        $this->jenis_draft = $peraturan->jenis_draft ?? 0; // Default to 0 if not set
        $this->document_peraturan_id = $peraturan->document_peraturan_id;
        if ($this->status == Peraturan::BERLAKU) {
            $this->parent_id = $peraturan->parent_id;
        }
        if ($peraturan->dokumen) {
            $this->document = asset('storage/' . $peraturan->dokumen->path);
        }

        $tipe_peraturan = TipePeraturan::find($peraturan->tipe_peraturan_id);
        if ($tipe_peraturan) {
            $this->tipe_peraturan = $tipe_peraturan->keterangan;
        }
        if ($peraturan->jenis) {
            $this->jenis_peraturan = $peraturan->jenis->keterangan;
        }
        $this->subjek = $peraturan->subjek->keterangan;
    }

}
