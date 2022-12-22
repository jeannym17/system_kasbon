<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PhpOption\None;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nip',
        'id_unit',
        'id_jabatan',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'id_unit', 'id');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan', 'id');
    }

    public function kasbon()
    {
        return $this->hasMany(Kasbon::class, 'id_verifikator_kasbon', 'id');
        return $this->hasMany(Kasbon::class, 'id_user', 'id');
        return $this->hasMany(Nonkasbon::class, 'id_verifikator_ptj', 'id');
    }

    public function nonkasbon()
    {
        return $this->hasMany(Nonkasbon::class, 'id_verifikator_kasbon', 'id');
        return $this->hasMany(Nonkasbon::class, 'id_user', 'id');
        return $this->hasMany(Nonkasbon::class, 'id_verifikator_ptj', 'id');
    }

    public function pertanggungan()
    {
        return $this->hasMany(Nonkasbon::class, 'id_verifikator_kasbon', 'id');
        return $this->hasMany(Kasbon::class, 'id_user', 'id');
        return $this->hasMany(Nonkasbon::class, 'id_verifikator_ptj', 'id');
    }

    public function verifikasi_kasbon()
    {
        return $this->hasMany(VerifikasiKasbon::class, 'id_vkb', 'id');
        return $this->hasMany(VerifikasiKasbon::class, 'id_vkb_a_1', 'id');
        return $this->hasMany(VerifikasiKasbon::class, 'id_vkb_a_12', 'id');
        return $this->hasMany(VerifikasiKasbon::class, 'id_vkb_a_13', 'id');
        return $this->hasMany(VerifikasiKasbon::class, 'id_vkb_a_2', 'id');
        return $this->hasMany(VerifikasiKasbon::class, 'id_vkb_a_3', 'id');
        return $this->hasMany(VerifikasiKasbon::class, 'id_vkb_a_4', 'id');
    }

    public function verifikasi_pertanggungan()
    {
        return $this->hasMany(VerifikasiKasbon::class, 'id_vkp', 'id');
        return $this->hasMany(VerifikasiKasbon::class, 'id_vkp_a_1', 'id');
        return $this->hasMany(VerifikasiKasbon::class, 'id_vkp_a_12', 'id');
        return $this->hasMany(VerifikasiKasbon::class, 'id_vkp_a_13', 'id');
        return $this->hasMany(VerifikasiKasbon::class, 'id_vkp_a_2', 'id');
        return $this->hasMany(VerifikasiKasbon::class, 'id_vkp_a_3', 'id');
        return $this->hasMany(VerifikasiKasbon::class, 'id_vkp_a_4', 'id');
    }
    public function verifikasi_nonkasbon()
    {
        return $this->hasMany(VerifikasiKasbon::class, 'id_vnk', 'id');
        return $this->hasMany(VerifikasiKasbon::class, 'id_vnk_a_1', 'id');
        return $this->hasMany(VerifikasiKasbon::class, 'id_vnk_a_12', 'id');
        return $this->hasMany(VerifikasiKasbon::class, 'id_vnk_a_13', 'id');
        return $this->hasMany(VerifikasiKasbon::class, 'id_vnk_a_2', 'id');
        return $this->hasMany(VerifikasiKasbon::class, 'id_vnk_a_3', 'id');
        return $this->hasMany(VerifikasiKasbon::class, 'id_vnk_a_4', 'id');
    }
}
