<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    use HasFactory;
    protected $fillable = [
        'pengajuan_id',
        'nama_proses',
        'target_selesai',
        'tanggal_selesai',
        'status'
    ];
}
