<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPPD extends Model
{
    use HasFactory;
    public $table = "sppd";
    protected $guarded = [];
    protected $dates = ['tglmasuk'];
    public function sppddetail()
    {
        return $this->hasMany(SPPDDetail::class, 'id_sppd', 'id');
    }
}
