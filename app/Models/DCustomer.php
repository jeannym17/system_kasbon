<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DCustomer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function kelengkapan()
    {
        return $this->belongsTo(Kelengkapan::class, 'id_dc', 'id');
    }
}
