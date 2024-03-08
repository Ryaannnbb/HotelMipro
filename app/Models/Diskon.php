<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Diskon extends Model
{
    use HasFactory;
    protected $table = 'diskons';
    protected $fillable =[
        'nama_diskon',
        'gambar',
        'deskripsi',
        'jenis',
        'potongan_harga',
        'awal_berlaku',
        'akhir_berlaku',
    ];
    public function detail_diskon(): HasMany
    {
        return $this->hasMany(DetailDiskon::class);
    }
}
