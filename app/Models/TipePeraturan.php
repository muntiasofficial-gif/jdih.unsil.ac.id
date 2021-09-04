<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipePeraturan extends Model
{
    use HasFactory;
    protected $table = 'tipe_peraturan';
    protected $fillable = [
        'keterangan'
    ];
}
