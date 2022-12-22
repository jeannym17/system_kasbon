<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeKasbon extends Model
{
    use HasFactory;

    public function kasbon()
    {
        return $this->hasMany(Kasbon::class, 'id_kodekasbon', 'id');
    }

    public function pertanggungan()
    {
        return $this->hasMany(Pertanggungan::class, 'id_kodekasbon', 'id');
    }

    public function nonkasbon()
    {
        return $this->hasMany(Nonkasbon::class, 'id_kodekasbon', 'id');
    }
}
