<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganPertanggungan extends Model
{
    use HasFactory;
    public $table = "keterangan_pertanggungan";
    protected $guarded = [];
    public function pertanggungan()
    {
        return $this->belongsTo(Pertanggungan::class, 'id_pertanggungan', 'id');
    }
}
