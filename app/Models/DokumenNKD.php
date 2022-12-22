<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenNKD extends Model
{
    use HasFactory;
    public $table = "dokumen_nkd";
    protected $guarded = [];

    public function dokumennk()
    {
        return $this->belongsTo(DokumenNK::class, 'id_dnk', 'id');
    }
}
