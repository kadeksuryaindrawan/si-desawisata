<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjekWisata extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengelola_id',
        'kabupaten_id',
        'nama',
        'alamat',
        'longitude',
        'latitude',
        'deskripsi',
    ];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id');
    }

    public function pengelola(){
        return $this->belongsTo(User::class,'pengelola_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
