<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_potensi_id',
        'objek_wisata_id',
        'nama',
        'harga_tiket',
        'alamat',
        'longitude',
        'latitude',
        'deskripsi',
        'fasilitas',
        'sosial_media',
        'kontak',
    ];

    public function jenis_potensi()
    {
        return $this->belongsTo(JenisPotensi::class, 'jenis_potensi_id');
    }

    public function objek_wisata()
    {
        return $this->belongsTo(ObjekWisata::class, 'objek_wisata_id');
    }

    public function potensi_images()
    {
        return $this->hasMany(PotensiImage::class);
    }
}
