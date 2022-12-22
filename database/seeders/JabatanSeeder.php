<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jabatan')->insert([
            [
                'id' => '1',
                'name' => 'ADMIN AKUNTANSI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '2',
                'name' => 'ADMIN EKSPEDISI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '3',
                'name' => 'ADMIN KEUANGAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '4',
                'name' => 'ADMIN PEMASARAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '5',
                'name' => 'ADMIN PEMBELIAN KOMPONEN PENDUKUNG',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '6',
                'name' => 'ADMIN PEMBELIAN KOMPONEN UTAMA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '7',
                'name' => 'ADMIN PENGENDALIAN KUALITAS & PURNA JUAL',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '8',
                'name' => 'ADMIN PERENCANAAN & PENGENDALIAN PENGADAAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '9',
                'name' => 'ADMIN PERGUDANGAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '10',
                'name' => 'ADMIN SDM',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '11',
                'name' => 'ADMIN UMUM',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '12',
                'name' => 'ADMIN TATA KELOLA & MANAJEMEN RESIKO',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '13',
                'name' => 'DIREKTUR KEUANGAN, SDM & MANAJEMEN RISIKO',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '14',
                'name' => 'DIREKTUR OPERASIONAL',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '15',
                'name' => 'DIREKTUR UTAMA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '16',
                'name' => 'KEPALA DEPARTEMEN AKUNTANSI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '17',
                'name' => 'KEPALA DEPARTEMEN EKSPEDISI & PERGUDANGAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '18',
                'name' => 'KEPALA DEPARTEMEN KEUANGAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '19',
                'name' => 'KEPALA DEPARTEMEN PEMASARAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '20',
                'name' => 'KEPALA DEPARTEMEN PEMBELIAN KOMPONEN PENDUKUNG',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '21',
                'name' => 'KEPALA DEPARTEMEN PEMBELIAN KOMPONEN UTAMA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '22',
                'name' => 'KEPALA DEPARTEMEN PENGENDALIAN KUALITAS & PURNA JUAL',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '23',
                'name' => 'KEPALA DEPARTEMEN PERENCANAAN & PENGENDALIAN PENGADAAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '24',
                'name' => 'KEPALA DEPARTEMEN SDM & UMUM',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '25',
                'name' => 'KEPALA DEPARTEMEN TATA KELOLA & MANAJEMEN RESIKO',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '26',
                'name' => 'KEPALA DIVISI KEUANGAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '27',
                'name' => 'KEPALA DIVISI PEMASARAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '28',
                'name' => 'KEPALA DIVISI PENGADAAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '29',
                'name' => 'KEPALA DIVISI REALISASI PRODUK',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '30',
                'name' => 'KEPALA DIVISI SDM & UMUM',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '31',
                'name' => 'VERIFIKATOR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '32',
                'name' => 'STAF',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '33',
                'name' => 'SPESIALIS MUDA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '34',
                'name' => 'PLT KEPALA DEPARTEMEN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '35',
                'name' => 'KEPALA BAGIAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
