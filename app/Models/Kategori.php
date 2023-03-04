<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis_permintaan',
    ];

    public function pengajuan(){
        return $this->hasMany(Pengajuan::class, 'pengajuan_id');
    }
    
}
