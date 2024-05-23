<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PotensiImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function potensi()
    {
        return $this->belongsTo(Potensi::class, 'potensi_id');
    }
}
