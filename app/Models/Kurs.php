<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurs extends Model
{
    use HasFactory;

    public function kasbon()
    {
        return $this->hasMany(Kasbon::class, 'id_kurs', 'id');
    }

    public function nonkasbon()
    {
        return $this->hasMany(Nonkasbon::class, 'id_kurs', 'id');
    }
    public function sppd()
    {
        return $this->hasMany(SPPD::class, 'id_kurs', 'id');
    }
}
