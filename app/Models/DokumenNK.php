<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenNK extends Model
{
    use HasFactory;
    public $table = "dokumen_nk";
    protected $guarded = [];

    public function dokumennkd()
    {
        return $this->hasmany(DokumenNKD::class, 'id_dnk', 'id');
    }

    public function nonkasbon()
    {
        return $this->belongsTo(Nonkasbon::class, 'id_nonkasbon', 'id');
    }
}
