<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPeraturan extends Model
{
    use HasFactory;
    protected $table = 'jenis_peraturan';
    protected $fillable = [
        'keterangan'
    ];
}
