<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifikasiKasbon extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $dates = ['tgl_kelengkapan', 'tgl_vkb_a_1', 'tgl_vkb_a_12', 'tgl_vkb_a_13', 'tgl_vkb', 'tgl_vkb_a_2', 'tgl_vkb_a_3', 'tgl_vkb_a_4'];

    public function kasbon()
    {
        return $this->belongsTo(Kasbon::class, 'id_kasbon', 'id');
    }
    public function id_vkbn()
    {
        return $this->belongsTo(User::class, 'id_vkb', 'id');
    }
    public function id_vkb_a_1n()
    {
        return $this->belongsTo(User::class, 'id_vkb_a_1', 'id');
    }
    public function id_vkb_a_12n()
    {
        return $this->belongsTo(User::class, 'id_vkb_a_12', 'id');
    }
    public function id_vkb_a_13n()
    {
        return $this->belongsTo(User::class, 'id_vkb_a_13', 'id');
    }
    public function id_vkb_a_2n()
    {
        return $this->belongsTo(User::class, 'id_vkb_a_2', 'id');
    }
    public function id_vkb_a_3n()
    {
        return $this->belongsTo(User::class, 'id_vkb_a_3', 'id');
    }
    public function id_vkb_a_4n()
    {
        return $this->belongsTo(User::class, 'id_vkb_a_4', 'id');
    }
}
