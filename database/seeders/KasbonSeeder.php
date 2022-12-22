<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kasbon;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KasbonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('kasbons')->insert([
                'id_user' => '1',
                'id_jenis' => $faker->numberBetween(1, 3),
                'id_kodekasbon' => $faker->numberBetween(1, 3),
                'id_kurs' => $faker->numberBetween(1, 3),
                'id_pph' => $faker->numberBetween(1, 3),
                'id_unit' => $faker->numberBetween(1, 3),
                'id_bank' => $faker->numberBetween(1, 3),
                'nokasbon' => $faker->unique()->randomDigit,
                'tglmasuk' => $faker->dateTimeThisMonth(),
                'tgltempo' => $faker->dateTimeThisMonth(),
                'barang_datang' => $faker->dateTimeThisMonth(),
                'total' => $faker->randomDigit,
                'noinvoice' => $faker->randomDigit,
            ]);
        }
        // Kasbon::Factory(10)->create();
        // DB::table('kasbons')->insert([
        //     [
        //         'id' => '1',
        //         'nip' => '1231432',
        //         'username' => 'jeanny',
        //         'id_unit' => '1',
        //         'nokasbon' => 'PPK/1/XI/2022',
        //         'id_kodekasbon' => '1',
        //         'id_jenis' => '1',
        //         'id_kurs' => '1',
        //         'id_pph' => '1',
        //         'proyek' => 'abcd',
        //         'uraianpengguna' => 'abcd',
        //         'tglmasuk' => Carbon::now(),
        //         'jammasuk' => Carbon::now()->format('H:i:s'),
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //         'jeniskasbon' => 'KASBON RENCANA',
        //         'id_user' => '1',
        //         'doksebelumnya' => 'KSB20220915-0',
        //         'iddpp' => '1000',
        //         'idppn' => '1000',
        //         'id_pph' => '1',
        //         'idpph' => '1000',
        //         'total' => '3000',
        //         'namavendor' => '1',
        //         'haritempo' =>  '30',
        //         'tgltempo' => Carbon::now(),
        //         'noinvoice' => '432/4/3243',
        //         'spph' => '654654',
        //         'po_vendor' => '543543',
        //         'po_customer' => '432545',
        //         'sjn' => 'SJIMST/4324/35435',
        //         'harga_jual' => '3000',
        //         'barang_datang' => '2022-10-02',
        //         'formatkasbon' => 'KSB2022102-2;Kasbon Rencana AN Hardik Savani;treter;432;terer',
        //     ],
        // ]);
    }
}
