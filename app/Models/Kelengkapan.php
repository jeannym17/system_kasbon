<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelengkapan extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function dcustomer()
    {
        return $this->belongsTo(DCustomer::class, 'id_dc', 'id');
    }
    public function ddinas()
    {
        return $this->belongsTo(DDinas::class, 'id_dd', 'id');
    }
    public function dimpor()
    {
        return $this->belongsTo(DImpor::class, 'id_di', 'id');
    }
    public function dpajak()
    {
        return $this->belongsTo(DPajak::class, 'id_dp', 'id');
    }
    public function dvendor()
    {
        return $this->belongsTo(DVendor::class, 'id_dv', 'id');
    }
    public function keterangan()
    {
        return $this->belongsTo(Keterangan::class, 'id_kt', 'id');
    }
    public function kasbon()
    {
        return $this->belongsTo(Kasbon::class, 'nokasbon', 'nokasbon');
        return $this->belongsTo(Kasbon::class, 'id_kasbon', 'id');
        return $this->hasOne(Kasbon::class, 'id_kelengkapan', 'id');
    }
}
