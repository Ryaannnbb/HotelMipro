<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailDiskon extends Model
{
    use HasFactory;
    protected $table = 'detail_diskons';
    protected $fillable =[
        'kategori_id',
        'diskon_id',
        'nominal_potongan',
    ];
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }
    public function diskon(): BelongsTo
    {
        return $this->belongsTo(Diskon::class);
    }

}