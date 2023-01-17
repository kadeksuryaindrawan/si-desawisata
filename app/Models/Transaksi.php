<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'objek_wisata_id',
        'jumlah',
        'total',
        'status',
        'bukti_bayar',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function objekwisata(){
        return $this->belongsTo(ObjekWisata::class,'objek_wisata_id');
    }
}
