<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dvendor extends Model
{
    use HasFactory;
    public $table = "d_vendors";
    protected $guarded = [];

    public function kelengkapan()
    {
        return $this->belongsTo(Kelengkapan::class, 'id_dv', 'id');
    }
}
