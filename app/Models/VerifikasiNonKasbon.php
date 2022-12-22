<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifikasiNonKasbon extends Model
{
    use HasFactory;
    public $table = "verifikasi_non_kasbons";
    protected $dates = ['tgl_vnk_a_1', 'tgl_vnk_a_12', 'tgl_vnk_a_13', 'tgl_vnk', 'tgl_vnk_a_2', 'tgl_vnk_a_3', 'tgl_vnk_a_4'];
    protected $guarded = [];

    public function id_vnkn()
    {
        return $this->belongsTo(User::class, 'id_vnk', 'id');
    }
    public function id_vnk_a_1n()
    {
        return $this->belongsTo(User::class, 'id_vnk_a_1', 'id');
    }
    public function id_vnk_a_12n()
    {
        return $this->belongsTo(User::class, 'id_vnk_a_12', 'id');
    }
    public function id_vnk_a_13n()
    {
        return $this->belongsTo(User::class, 'id_vnk_a_13', 'id');
    }
    public function id_vnk_a_2n()
    {
        return $this->belongsTo(User::class, 'id_vnk_a_2', 'id');
    }
    public function id_vnk_a_3n()
    {
        return $this->belongsTo(User::class, 'id_vnk_a_3', 'id');
    }

    public function nonkasbon()
    {
        return $this->belongsTo(Nonkasbon::class, 'id_nonkasbon', 'id');
    }
}
