<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kabupaten'
    ];

    public function objekWisata()
    {
        return $this->hasMany(ObjekWisata::class);
    }
}
