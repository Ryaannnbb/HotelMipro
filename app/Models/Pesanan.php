<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanans';
    protected $Fillabel =[
        'email',
        'username',
        'telp',
        'tanggal_awal',
        'tanggal_akhir',
        'fasilitas',
        'metode_pembayaran',
        'adaulasan',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function room()
    {
        return $this->belongsTo(Kamar::class);
    }
    // public function ulasan()
    // {
    //     return $this->hasMany(Ulasan::class);
    // }
    public function pemakaian_fasilitas()
    {
        return $this->hasMany(PemakaianFasilitas::class);
    }

}
