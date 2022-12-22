<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganKasbon extends Model
{
    use HasFactory;
    public $table = "keterangan_kasbon";
    protected $guarded = [];
    public function kasbon()
    {
        return $this->belongsTo(Kasbon::class, 'id_kasbon', 'id');
    }
}
