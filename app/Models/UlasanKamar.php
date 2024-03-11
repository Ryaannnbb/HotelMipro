<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UlasanKamar extends Model
{
    use HasFactory;
    protected $table = 'ulasan_kamars';

    protected $fillable = [
        'id',
        'rating',
        'ulasan',
        'id',
        'user_id',
    ];

    public function Kamar()
    {
        return $this->belongsTo(Kamar::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
