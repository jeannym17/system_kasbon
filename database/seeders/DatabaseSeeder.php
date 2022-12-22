<?php

namespace Database\Seeders;

use App\Models\Nonkasbon;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UnitSeeder::class,
            JabatanSeeder::class,
            BankSeeder::class,
            JenisSeeder::class,
            KursSeeder::class,
            PphSeeder::class,
            PermissionTableSeeder::class,
            CreateAdminUserSeeder::class,
            KodeKasbonSeeder::class,
            NamaVendorSeeder::class,
            KasbonSeeder::class,
            NonkasbonSeeder::class,
            VerifikasiKasbonSeeder::class,
            RateSeeder::class,
        ]);
    }
}
