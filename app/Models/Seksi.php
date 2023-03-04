<?php

namespace App\Models;

use App\Models\Pengajuan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_seksi',
    ];

    public function pengajuan(){
        $this->hasMany(Pengajuan::class, 'pengajuan_id');
    }
}
