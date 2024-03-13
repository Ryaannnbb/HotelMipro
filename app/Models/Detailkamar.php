<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailkamar extends Model
{
    use HasFactory;
    protected $table = 'detailkamars';

    protected $fillable = [
        'id',
        'rating',
        'ulasan',
        'foto',
        'kamar_id', // Ubah id menjadi kamar_id
        'user_id',
    ];
    public function Kamar()
    {
        return $this->belongsTo(Kamar::class , 'kamar_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
