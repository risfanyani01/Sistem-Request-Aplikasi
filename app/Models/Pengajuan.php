<?php

namespace App\Models;

use App\Models\Seksi;
use App\Models\Kategori;
use App\Models\Departemen;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengajuan extends Model
{
    use HasFactory;
    protected $fillable = [
        'kategori_id',
        'seksi_id',
        'departemen_id',
        'nama_aplikasi',
        'penjelasan',
        'keterangan',
        'tanggal_pengajuan',
        'gambar'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function seksi()
    {
        return $this->belongsTo(Seksi::class, 'seksi_id');
    }
    
    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'departemen_id');
    }
}
