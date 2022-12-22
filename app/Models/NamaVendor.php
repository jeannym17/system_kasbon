<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamaVendor extends Model
{
    use HasFactory;
    public $table = "nama_vendor";
    protected $guarded = [];
}
