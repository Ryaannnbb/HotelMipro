<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanans';

    protected $fillable = [
        'email',
        'username',
        'telp',
        'tanggal_awal',
        'tanggal_akhir',
        'fasilitas',
        'metode_pembayaran',
        'adaulasan',
        'foto',
        'rooms_id',
        'user_id',
        'kategori_id'
    ];

    // Relasi dengan user
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    // Relasi dengan kamar
    // public function room()
    // {
    //     return $this->belongsTo(Kamar::class, 'room_id'); // Menambahkan 'room_id' sebagai foreign key
    // }

    // Relasi dengan pemakaian fasilitas
    public function pemakaian_fasilitas()
    {
        return $this->hasMany(PemakaianFasilitas::class);
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
