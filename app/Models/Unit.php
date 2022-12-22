<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user()
    {
        return $this->hasMany(User::class, 'id_unit', 'id');
    }
    public function kasbon()
    {
        return $this->hasMany(Kasbon::class, 'id_unit', 'id');
    }

    public function pertanggungan()
    {
        return $this->hasMany(Pertanggungan::class, 'id_unit', 'id');
    }

    public function nonkasbon()
    {
        return $this->hasMany(Nonkasbon::class, 'id_unit', 'id');
    }
}
