<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peraturan extends Model
{
    use HasFactory;
    protected $table = 'peraturan';
    protected $fillable = [
        'judul',
        'badan',
        'nomor_peraturan',
        'tempat_penetapan',
        'tahun',
        'tanggal_ditetapkan',
        'tanggal_diundangkan',
        'status',
        'bahasa',
        'lokasi',
        'created_by',
        'subjek_id',
        'tipe_peraturan_id',
        'jenis_peraturan_id',
        'document_peraturan_id',
        'is_publish'
    ];

    static public function tahun()
    {
        $year = self::orderBy('tahun','desc')->first();
        $initYear = $year->tahun >= (Carbon::now()->format('Y')-5) ? Carbon::now()->format('Y') - 10  : $year->tahun;
        $range = range($initYear,Carbon::now()->format('Y'));
        return collect(array_combine($range,$range));
    }
    static public function status()
    {
        return collect([
            'Berlaku' => 'Berlaku',
            'Tidak Berlaku' => 'Tidak Berlaku'
        ]);
    }
    public function jenis(){
        return $this->belongsTo(JenisPeraturan::class,'jenis_peraturan_id','id');
    }
    public function subjek()
    {
        return $this->belongsTo(Kategori::class,'subjek_id','id');
    }
    public function tipe_peraturan()
    {
        return $this->belongsTo(TipePeraturan::class,'tipe_peraturan_id','id');
    }
    public function dokumen()
    {
        return $this->belongsTo(Document::class,'document_peraturan_id','id');
    }
}
