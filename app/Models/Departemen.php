<?php

namespace App\Models;

use App\Models\Pengajuan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departemen extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_departemen',
    ];

    // Relasi Dengan Tabel Pengajuan
    public function pengajuan(){
        $this->hasMany(Pengajuan::class, 'pengajuan_id');
    }
}
