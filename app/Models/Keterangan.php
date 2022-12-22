<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keterangan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kelengkapan()
    {
        return $this->belongsTo(Kelengkapan::class, 'id_kt', 'id');
    }

    public function kasbon()
    {
        return $this->belongsTo(Kasbon::class, 'nokasbon', 'nokasbon');
    }

    public function keterangan_detail()
    {
        return $this->hasMany(Keterangan_detail::class, 'id_keterangan', 'id');
    }
}
