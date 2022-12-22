<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role',
            'user',
            'unit',
            'jabatan',
            'kasbon',
            'pertanggungan',
            'sppd',
            'nonkasbon',
            'atasan-user-1',
            'atasan-user-2',
            'atasan-user-3',
            'verifikator',
            'atasan-verifikator-1',
            'atasan-verifikator-2',
            'atasan-verifikator-3',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
