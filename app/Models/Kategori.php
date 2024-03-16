<?php

namespace App\Models;

use App\Models\Kamar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategoris';
    protected $fillable = [
        'id',
        'nama_kategori',
        // 'harga',
    ];

    public function room() : HasMany
    {
        return $this->hasMany(Kamar::class);
    }

    public function kategori() : HasMany
    {
        return $this->hasMany(Kategori::class);
    }
}
