<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonitoringSP extends Model
{
    use HasFactory;
    public $table = "monitoringsp";
    protected $guarded = [];

    protected $dates = ['tgl_kelengkapan'];

    public function kasbon()
    {
        return $this->belongsTo(Kasbon::class, 'id_kasbon', 'id');
    }
}
