<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rates')->insert([
            [
                'id' => '1',
                'name' => 'DRIVER',
                'harga' => '100000',
            ],
            [
                'id' => '2',
                'name' => 'STAFF',
                'harga' => '200000',
            ],
            [
                'id' => '3',
                'name' => 'KABAG',
                'harga' => '250000',

            ],
            [
                'id' => '4',
                'name' => 'KADEP',
                'harga' => '300000',
            ],
            [
                'id' => '5',
                'name' => 'KADIV',
                'harga' => '350000',
            ],
            [
                'id' => '6',
                'name' => 'DIREKSI',
                'harga' => '400000',
            ]
        ]);
    }
}
