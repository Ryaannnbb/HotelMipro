<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Diskon extends Model
{
    use HasFactory;
    protected $table = 'diskons';
    protected $fillable =[
        'kategori_id',
        'nama_diskon',
        'gambar',
        'deskripsi',
        'jenis',
        'potongan_harga',
        'awal_berlaku',
        'akhir_berlaku',
    ];
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }
    public function Pesanan(): HasMany
    {
        return $this->hasMany(Pesanan::class);
    }
}
