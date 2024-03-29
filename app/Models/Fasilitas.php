<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;
    protected $table = 'fasilitas';
    protected $fillable =[
        'id',
        'nama_fasilitas',
        'harga_satuan',
    ];

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }

}
