<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifikasiPertanggungan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['tgl_kelengkapan', 'tgl_vkp_a_1', 'tgl_vkp_a_12', 'tgl_vkp_a_13', 'tgl_vkp', 'tgl_vkp_a_2', 'tgl_vkp_a_3', 'tgl_vkp_a_4'];
    public function pertanggungan()
    {
        return $this->belongsTo(Pertanggungan::class, 'id_pertanggungan', 'id');
    }
    public function id_vkpn()
    {
        return $this->belongsTo(User::class, 'id_vkp', 'id');
    }
    public function id_vkp_a_1n()
    {
        return $this->belongsTo(User::class, 'id_vkp_a_1', 'id');
    }
    public function id_vkp_a_12n()
    {
        return $this->belongsTo(User::class, 'id_vkp_a_12', 'id');
    }
    public function id_vkp_a_13n()
    {
        return $this->belongsTo(User::class, 'id_vkp_a_13', 'id');
    }
    public function id_vkp_a_2n()
    {
        return $this->belongsTo(User::class, 'id_vkp_a_2', 'id');
    }
    public function id_vkp_a_3n()
    {
        return $this->belongsTo(User::class, 'id_vkp_a_3', 'id');
    }
}
