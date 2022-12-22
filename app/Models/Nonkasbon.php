<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nonkasbon extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['tglmasuk'];
    public function kodekasbon()
    {
        return $this->belongsTo(KodeKasbon::class, 'id_kodekasbon', 'id');
    }

    public function kurs()
    {
        return $this->belongsTo(Kurs::class, 'id_kurs', 'id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'id_unit', 'id');
    }

    public function verifikasinonkasbon()
    {
        return $this->hasone(VerifikasiNonKasbon::class, 'id_nonkasbon', 'id');
    }

    public function dokumennk()
    {
        return $this->hasone(DokumenNK::class, 'id_nonkasbon', 'id');
    }
    // public function dokumennkd()
    // {
    //     return $this->hasone(DokumenNKD::class, 'id_nonkasbon', 'id');
    // }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function keterangannonkasbon()
    {
        return $this->hasOne(KeteranganNonKasbon::class, 'id_nonkasbon', 'id');
    }
    public function pph()
    {
        return $this->belongsTo(Pph::class, 'id_pph', 'id');
    }
}
