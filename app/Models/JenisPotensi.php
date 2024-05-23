<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPotensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_jenis_potensi'
    ];

    public function potensi()
    {
        return $this->hasMany(Potensi::class);
    }
}
