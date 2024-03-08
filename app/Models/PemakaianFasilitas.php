<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PemakaianFasilitas extends Model
{
    use HasFactory;
    protected $table = 'pemakaian_fasilitas';
    protected $fillable =[
        'pesanan_id',
        'fasilitas_id',
        'jumlah_pemakaian',
        'harga_pemakaian',
        'tanggal_pemakaian',
    ];
    public function pesanan(): BelongsTo
    {
        return $this->belongsTo(Pesanan::class);
    }
    public function fasilitas(): BelongsTo
    {
        return $this->BelongsTo(Fasilitas::class);
    }

}
