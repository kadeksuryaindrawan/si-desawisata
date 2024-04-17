<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function objek_wisata()
    {
        return $this->belongsTo(ObjekWisata::class, 'objek_wisata_id');
    }
}
