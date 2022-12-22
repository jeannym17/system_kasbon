<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keterangan_detail extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['tgl_kelengkapan'];
    public function keterangan()
    {
        return $this->belongsTo(Keterangan::class, 'id_keterangan', 'id');
    }
}
