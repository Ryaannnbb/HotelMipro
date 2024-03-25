<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kamar extends Model
{
    use HasFactory;
    protected $table = 'kamars';
    protected $fillable = [
        'kamar_id',
        'nama_kamar',
        'path_kamar',
        'path_kamar1',
        'path_kamar2',
        'harga',
        'deskripsi',
        'status',
        'kategori_id'
    ];
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

    public function Detailkamar()
    {
        return $this->hasMany(Detailkamar::class);
    }

}
