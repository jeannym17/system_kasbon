<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    public function sppd()
    {
        return $this->hasMany(Rate::class, 'id_rate', 'harga');
    }
}
