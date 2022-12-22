<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verifikator extends Model
{
    use HasFactory;

    public function kasbon()
    {
        return $this->belongsTo(Kasbon::class, 'kodekasbon', 'kodekasbon');
    }
}
