<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peraturan extends Model
{
    use HasFactory;

    const BERLAKU = 'Berlaku';
    const TIDAK_BERLAKU = 'Tidak Berlaku';

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
        'is_publish',
        'count',
        'count_download',
        'parent_id'
    ];

    static public function tahun()
    {
        $year = self::orderBy('tahun', 'desc')->first();
        if ($year) {
            $initYear = $year->tahun >= (Carbon::now()->format('Y') - 5) ? Carbon::now()->format('Y') - 10 : $year->tahun;
        } else {
            $initYear = Carbon::now()->format('Y') - 10;
        }
        $range = range($initYear, Carbon::now()->format('Y'));
        return collect(array_combine($range, $range));
    }

    static public function status($status = false)
    {
        $data = [
            Peraturan::BERLAKU => 'Berlaku',
            Peraturan::TIDAK_BERLAKU => 'Tidak Berlaku'
        ];
        if ($status) {
            return @$data[$status] ?? false;
        }
        return collect($data);
    }

    public function jenis()
    {
        return $this->belongsTo(JenisPeraturan::class, 'jenis_peraturan_id', 'id');
    }

    public function subjek()
    {
        return $this->belongsTo(Kategori::class, 'subjek_id', 'id');
    }

    public function tipe_peraturan()
    {
        return $this->belongsTo(TipePeraturan::class, 'tipe_peraturan_id', 'id');
    }

    public function allParent()
    {
        return $this->parent()->with('allParent');
    }
    public function allChild()
    {
        return $this->child()->with('allChild');
    }

    public function parent()
    {
        return $this->belongsTo(Peraturan::class, 'parent_id', 'id');
    }

    public function child()
    {
        return $this->hasMany(Peraturan::class, 'parent_id', 'id');
    }

    public function dokumen()
    {
        return $this->belongsTo(Document::class, 'document_peraturan_id', 'id');
    }
}
