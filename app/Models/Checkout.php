<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $table = 'checkouts';
    protected $fillable = [
        'metode_pembayaran',
        'tujuan_ewallet',
        'tujuan_bank',
        'foto',
        'awal_berlaku',
        'akhir_berlaku',
    ];

    public function fasilitas()
    {
        return $this->belongsToMany(Fasilitas::class);
    }
}
