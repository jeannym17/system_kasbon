<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganNonKasbon extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function nonkasbon()
    {
        return $this->belongsTo(NonKasbon::class, 'id_nonkasbon', 'id');
    }
}
