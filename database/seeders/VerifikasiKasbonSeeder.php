<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VerifikasiKasbonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('verifikasi_kasbons')->insert([
            [
                'id' => '1',
                'id_kasbon' => '1',
                'status' => 'Dalam Proses',
            ],
        ]);
    }
}
