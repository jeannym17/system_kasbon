<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'ADMIN']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);

        $role = Role::create(['name' => 'USER']);
        $role->givePermissionTo('kasbon');
        $role->givePermissionTo('pertanggungan');
        $role->givePermissionTo('nonkasbon');

        $role = Role::create(['name' => 'ATASAN USER 1']);
        $role->givePermissionTo('atasan-user-1');

        $role = Role::create(['name' => 'ATASAN USER 2']);
        $role->givePermissionTo('atasan-user-2');

        $role = Role::create(['name' => 'ATASAN USER 3']);
        $role->givePermissionTo('atasan-user-3');

        $role = Role::create(['name' => 'VERIFIKATOR']);
        $role->givePermissionTo('verifikator');
        $role->givePermissionTo('sppd');

        $role = Role::create(['name' => 'ATASAN VERIFIKATOR 1']);
        $role->givePermissionTo('atasan-verifikator-1');

        $role = Role::create(['name' => 'ATASAN VERIFIKATOR 2']);
        $role->givePermissionTo('atasan-verifikator-2');

        $role = Role::create(['name' => 'ATASAN VERIFIKATOR 3']);
        $role->givePermissionTo('atasan-verifikator-3');

        $user = User::create(
            [
                'name' => 'ARYANI DEVIANA',
                'email' => 'ADMSAR',
                'password' => bcrypt('632100015Aryani'),
                'id_unit' => '2',
                'id_jabatan' => '4',
                'nip' => '632100015',
            ],
        );
        $user->assignRole('2');

        $user = User::create(
            [
                'name' => 'EMANUEL PASTIADI',
                'email' => 'KADEPSAR',
                'password' => bcrypt('999500020Emanuel'),
                'id_unit' => '2',
                'id_jabatan' => '19',
                'nip' => '999500020',
            ]
        );
        $user->assignRole('3');

        $user = User::create(
            [
                'name' => 'ABDULLAH MAJID AL FATAH',
                // 'email' => 'KADEPSAR',
                'password' => bcrypt('632100010Majid'),
                'id_unit' => '5',
                'id_jabatan' => '32',
                'nip' => '632100010',
            ]
        );
        $user->assignRole('1');

        //divisi pemasaran
        // $user = User::create(
        //     [
        //         'name' => 'ARYANI DEVIANA',
        //         'email' => 'ADMSAR',
        //         'password' => bcrypt('632100015Aryani'),
        //         'id_unit' => '2',
        //         'id_jabatan' => '4',
        //         'nip' => '632100015',
        //     ]
        // );


        $user = User::create(
            [
                'name' => 'EMANUEL PASTIADI',
                'email' => 'KADIVSAR',
                'password' => bcrypt('Emanuel999500020'),
                'id_unit' => '2',
                'id_jabatan' => '27',
                'nip' => '999500020',
            ]
        );
        $user->assignRole('4');

        $user = User::create(
            [
                'name' => 'WAI WAHDAN',
                'email' => 'DIRUT01',
                'password' => bcrypt('999600019Wai'),
                'id_unit' => '2',
                'id_jabatan' => '15',
                'nip' => '999600019',
            ]
        );
        $user->assignRole('5');

        //divisi pengadaan
        $user = User::create(
            [
                'name' => 'RACHMA WAHYUNING CITRA',
                'email' => 'ADMKOMUT',
                'password' => bcrypt('632100020Rachma'),
                'id_unit' => '3',
                'id_jabatan' => '6',
                'nip' => '632100020',
            ]
        );
        $user->assignRole('2');

        $user = User::create(
            [
                'name' => 'GUNAWAN',
                'email' => 'KADEPKOMUT',
                'password' => bcrypt('991700063Gunawan'),
                'id_unit' => '3',
                'id_jabatan' => '21',
                'nip' => '991700063',
            ]
        );
        $user->assignRole('3');

        $user = User::create(
            [
                'name' => 'ADITRIE VIDYASWARI',
                'email' => 'ADMKOMPEN',
                'password' => bcrypt('991900021Aditrie'),
                'id_unit' => '3',
                'id_jabatan' => '5',
                'nip' => '991900021',
            ]
        );
        $user->assignRole('2');

        $user = User::create(
            [
                'name' => 'DEDDI WAHYUDI',
                'email' => 'KADEPKOMPEN',
                'password' => bcrypt('961800003Deddi'),
                'id_unit' => '3',
                'id_jabatan' => '20',
                'nip' => '961800003',
            ]
        );
        $user->assignRole('3');

        $user = User::create(
            [
                'name' => 'NUR TYAS ANGGRAENI',
                'email' => 'ADMRENDAL',
                'password' => bcrypt('961600001Nur'),
                'id_unit' => '3',
                'id_jabatan' => '8',
                'nip' => '961600001',
            ]
        );
        $user->assignRole('2');

        $user = User::create(
            [
                'name' => 'DODI',
                'email' => 'KADEPRENDAL',
                'password' => bcrypt('991600021Dodi'),
                'id_unit' => '3',
                'id_jabatan' => '23',
                'nip' => '991600021',
            ]
        );
        $user->assignRole('3');

        $user = User::create(
            [
                'name' => 'NURUL FADHILAH',
                'email' => 'KADIVPGD',
                'password' => bcrypt('999700003Nurul'),
                'id_unit' => '3',
                'id_jabatan' => '28',
                'nip' => '999700003',
            ]
        );
        $user->assignRole('4');

        $user = User::create(
            [
                'name' => 'SANKI ARIS SUSANTO',
                'email' => 'DIROP01',
                'password' => bcrypt('999600033Sanki'),
                'id_unit' => '3',
                'id_jabatan' => '14',
                'nip' => '999600033',
            ]
        );
        $user->assignRole('5');
        //divisi realisasi produk
        $user = User::create(
            [
                'name' => 'NAIMATU SANIATI RODHIYA',
                'email' => 'ADMINEXPED',
                'password' => bcrypt('631800027Naimatu'),
                'id_unit' => '4',
                'id_jabatan' => '2',
                'nip' => '631800027',
            ]
        );
        $user->assignRole('2');

        $user = User::create(
            [
                'name' => 'YULI LESTARI',
                'email' => 'ADMINWH',
                'password' => bcrypt('632100012Yuli'),
                'id_unit' => '4',
                'id_jabatan' => '9',
                'nip' => '632100012',
            ]
        );
        $user->assignRole('2');

        $user = User::create(
            [
                'name' => 'PAJAR BASUKI',
                'email' => 'KADEPEXWH',
                'password' => bcrypt('999800001Pajar'),
                'id_unit' => '4',
                'id_jabatan' => '17',
                'nip' => '999800001',
            ]
        );
        $user->assignRole('3');

        $user = User::create(
            [
                'name' => 'RIZQY DEVTIANA PUTERI',
                'email' => 'ADMINQC',
                'password' => bcrypt('632000006Rizqy'),
                'id_unit' => '4',
                'id_jabatan' => '7',
                'nip' => '632000006',
            ]
        );
        $user->assignRole('2');

        $user = User::create(
            [
                'name' => 'MINARKO',
                'email' => 'KADEPQC',
                'password' => bcrypt('999200025Minarko'),
                'id_unit' => '4',
                'id_jabatan' => '22',
                'nip' => '999200025',
            ]
        );
        $user->assignRole('3');

        $user = User::create(
            [
                'name' => 'HARIESYA RANDI ARTANTO',
                'email' => 'KADIVREPRO',
                'password' => bcrypt('991100045Hariesya'),
                'id_unit' => '2',
                'id_jabatan' => '29',
                'nip' => '991100045',
            ]
        );
        $user->assignRole('4');

        //divisi keuangan
        $user = User::create(
            [
                'name' => 'UUS MUSYAROFAH',
                'email' => 'ADMKEU',
                'password' => bcrypt('962100003Uus'),
                'id_unit' => '1',
                'id_jabatan' => '3',
                'nip' => '962100003',
            ]
        );
        $user->assignRole('2');

        $user = User::create(
            [
                'name' => 'TENDHY ANDAR AGUSMA',
                'email' => 'VERIF01',
                'password' => bcrypt('631800001Tendhy'),
                'id_unit' => '1',
                'id_jabatan' => '31',
                'nip' => '631800001',
            ]
        );
        $user->assignRole('6');

        $user = User::create(
            [
                'name' => 'ZAHRIA ULFA',
                'email' => 'KADEPKEU',
                'password' => bcrypt('961800004Zahria'),
                'id_unit' => '1',
                'id_jabatan' => '18',
                'nip' => '961800004',
            ]
        );
        $user->assignRole('3');

        $user = User::create(
            [
                'name' => 'MAMIK APRILIANA',
                'email' => 'ADMAKT',
                'password' => bcrypt('962100001Mamik'),
                'id_unit' => '1',
                'id_jabatan' => '1',
                'nip' => '962100001',
            ]
        );
        $user->assignRole('2');

        $user = User::create(
            [
                'name' => 'NUROCHIM',
                'email' => 'KADEPAKT',
                'password' => bcrypt('999800180Nurochim'),
                'id_unit' => '1',
                'id_jabatan' => '16',
                'nip' => '999800180',
            ]
        );
        $user->assignRole('7');

        $user = User::create(
            [
                'name' => 'NUROCHIM',
                'email' => 'KADIVKEU',
                'password' => bcrypt('Nurochim999800180'),
                'id_unit' => '1',
                'id_jabatan' => '26',
                'nip' => '999800180',
            ]
        );
        $user->assignRole('8');

        $user = User::create(
            [
                'name' => 'BADRIYATUL HIDAYAH',
                'id_unit' => '1',
                'id_jabatan' => '32',
                'nip' => '962100007',
            ]
        );

        $user = User::create(
            [
                'name' => 'MUHAMMAD GUFRON FADLY',
                'email' => 'DIRKEU01',
                'password' => bcrypt('991000013Muhammad'),
                'id_unit' => '1',
                'id_jabatan' => '13',
                'nip' => '991000013',
            ]
        );
        $user->assignRole('9');

        $user = User::create(
            [
                'name' => 'VRISCO DIKO SYAHPUTRA ANANTA',
                'email' => 'ADMGA',
                'password' => bcrypt('631800015Vrisco'),
                'id_unit' => '5',
                'id_jabatan' => '11',
                'nip' => '631800015',
            ]
        );
        $user->assignRole('2');

        $user = User::create(
            [
                'name' => 'SRI ENDAH NUGRAHANI',
                'email' => 'KADEPHRGA',
                'password' => bcrypt('999400008Sri'),
                'id_unit' => '5',
                'id_jabatan' => '24',
                'nip' => '999400008',
            ]
        );
        $user->assignRole('3');

        $user = User::create(
            [
                'name' => 'RATNA PERMANASARI',
                'email' => 'ADMTKMR',
                'password' => bcrypt('961600002Ratna'),
                'id_unit' => '5',
                'id_jabatan' => '12',
                'nip' => '961600002',
            ]
        );
        $user->assignRole('2');

        $user = User::create(
            [
                'name' => 'GODROEPT OKTABRYA SIAPUL HAMI HUTABARAT',
                'email' => 'KADEPTKMR',
                'password' => bcrypt('999300005Godroept'),
                'id_unit' => '5',
                'id_jabatan' => '25',
                'nip' => '999300005',
            ]
        );
        $user->assignRole('3');

        $user = User::create(
            [
                'name' => 'SRI ENDAH NUGRAHANI',
                'email' => 'KADIVHRGA',
                'password' => bcrypt('Sri999400008'),
                'id_unit' => '5',
                'id_jabatan' => '30',
                'nip' => '999400008',
            ]
        );
        $user->assignRole('4');

        $user = User::create(
            [
                'name' => 'HARMONI FILANTROPI',
                'id_unit' => '3',
                'id_jabatan' => '8',
                'nip' => '991500002',
            ]
        );

        $user = User::create(
            [
                'name' => 'YUSSI TRISTANTI',
                'id_unit' => '1',
                'id_jabatan' => '33',
                'nip' => '961900003',
            ]
        );

        $user = User::create(
            [
                'name' => 'ARDI ALVIANTO PRIHANDOYO',
                'id_unit' => '5',
                'id_jabatan' => '33',
                'nip' => '961900002',
            ]
        );
        $user = User::create(
            [
                'name' => 'WILDAN MUBARAK AL FARUQI',
                'id_unit' => '5',
                'id_jabatan' => '35',
                'nip' => '961900001',
            ]
        );
        $user = User::create(
            [
                'name' => "MOH. FAT'AK DIYA'UL HAQ",
                'id_unit' => '4',
                'id_jabatan' => '35',
                'nip' => '962100006',
            ]
        );
        $user = User::create(
            [
                'name' => 'JOKO SETYO UTOMO',
                'id_unit' => '5',
                'id_jabatan' => '33',
                'nip' => '999200035',
            ]
        );
        $user = User::create(
            [
                'name' => 'PONANG CATUR SUDIANA',
                'id_unit' => '5',
                'id_jabatan' => '33',
                'nip' => '999500005',
            ]
        );
        $user = User::create(
            [
                'name' => 'SIRAN',
                'id_unit' => '4',
                'id_jabatan' => '35',
                'nip' => '999800048',
            ]
        );
        $user = User::create(
            [
                'name' => 'SUKARYONO',
                'id_unit' => '4',
                'id_jabatan' => '33',
                'nip' => '999800011',
            ]
        );
        $user = User::create(
            [
                'name' => 'ANI PURWITANINGSIH',
                'id_unit' => '3',
                'id_jabatan' => '33',
                'nip' => '999600029',
            ]
        );
        $user = User::create(
            [
                'name' => 'WAWAN KRISTANTO',
                'id_unit' => '3',
                'id_jabatan' => '33',
                'nip' => '999600025',
            ]
        );
        $user = User::create(
            [
                'name' => 'SATRIYO YUDI BASKORO',
                'id_unit' => '3',
                'id_jabatan' => '33',
                'nip' => '999600025',
            ]
        );
        $user = User::create(
            [
                'name' => 'KURNIAWAN JAUHARI',
                'id_unit' => '4',
                'id_jabatan' => '33',
                'nip' => '961700003',
            ]
        );
        $user = User::create(
            [
                'name' => 'KURNIAWAN JAUHARI',
                'id_unit' => '4',
                'id_jabatan' => '33',
                'nip' => '961700003',
            ]
        );
        $user = User::create(
            [
                'name' => 'KHOIRUL HUDA',
                'id_unit' => '1',
                'id_jabatan' => '32',
                'nip' => '632000001',
            ]
        );
        $user = User::create(
            [
                'name' => 'MUHAMMAD TRY REYNALDHIE',
                'id_unit' => '1',
                'id_jabatan' => '32',
                'nip' => '632100011',
            ]
        );
        $user = User::create(
            [
                'name' => 'ALDYLLA DWI NUR WIJAYANTI',
                'id_unit' => '5',
                'id_jabatan' => '32',
                'nip' => '632200001',
            ]
        );
        $user = User::create(
            [
                'name' => 'BINGAR CAHYANING MARHAENAYU',
                'id_unit' => '5',
                'id_jabatan' => '32',
                'nip' => '632100005',
            ]
        );
        $user = User::create(
            [
                'name' => 'CITRA DEVI WAHYU ANGGRAINI',
                'id_unit' => '5',
                'id_jabatan' => '32',
                'nip' => '632100001',
            ]
        );
        $user = User::create(
            [
                'name' => 'MAULIDA NUR KURNIAWATI',
                'id_unit' => '5',
                'id_jabatan' => '32',
                'nip' => '632100017',
            ]
        );
        $user = User::create(
            [
                'name' => 'RAGIL IMAM UTOMO',
                'id_unit' => '5',
                'id_jabatan' => '32',
                'nip' => '631800037',
            ]
        );
        $user = User::create(
            [
                'name' => 'SULUH GUMELAR WINAHYU',
                'id_unit' => '5',
                'id_jabatan' => '32',
                'nip' => '632100016',
            ]
        );
        $user = User::create(
            [
                'name' => 'YODA HENRY PRADANA',
                'id_unit' => '5',
                'id_jabatan' => '32',
                'nip' => '632100006',
            ]
        );
        $user = User::create(
            [
                'name' => 'ABDULLOH AFIF',
                'id_unit' => '4',
                'id_jabatan' => '32',
                'nip' => '632000008',
            ]
        );
        $user = User::create(
            [
                'name' => 'AMBARWARIH WIRATMOJO',
                'id_unit' => '4',
                'id_jabatan' => '32',
                'nip' => '632100002',
            ]
        );
        $user = User::create(
            [
                'name' => 'DES WAHYUDIN',
                'id_unit' => '4',
                'id_jabatan' => '32',
                'nip' => '632100009',
            ]
        );
        $user = User::create(
            [
                'name' => 'HASANUDIN',
                'id_unit' => '4',
                'id_jabatan' => '32',
                'nip' => '632100013',
            ]
        );
        $user = User::create(
            [
                'name' => 'I GUSTI BAGUS BAYU SAPUTRO',
                'id_unit' => '4',
                'id_jabatan' => '32',
                'nip' => '631800025',
            ]
        );
        $user = User::create(
            [
                'name' => 'IDA BAGUS MADE SURYA DHARMA',
                'id_unit' => '4',
                'id_jabatan' => '32',
                'nip' => '632100014',
            ]
        );
        $user = User::create(
            [
                'name' => 'MUFID RIZALIANI',
                'id_unit' => '4',
                'id_jabatan' => '32',
                'nip' => '631800033',
            ]
        );
        $user = User::create(
            [
                'name' => 'NOVIAWAN ROBY PRATAMA',
                'id_unit' => '4',
                'id_jabatan' => '32',
                'nip' => '632000005',
            ]
        );
        $user = User::create(
            [
                'name' => 'PUNGKI DWI YUDATAMA',
                'id_unit' => '4',
                'id_jabatan' => '32',
                'nip' => '631800032',
            ]
        );
        $user = User::create(
            [
                'name' => 'RAYNALDI PRANATA',
                'id_unit' => '4',
                'id_jabatan' => '32',
                'nip' => '632100003',
            ]
        );
        $user = User::create(
            [
                'name' => 'WIJIANTO',
                'id_unit' => '4',
                'id_jabatan' => '32',
                'nip' => '631900001',
            ]
        );
        $user = User::create(
            [
                'name' => 'ZENDY AGUS PRASETYA',
                'id_unit' => '3',
                'id_jabatan' => '32',
                'nip' => '632100008',
            ]
        );
        $user = User::create(
            [
                'name' => 'PANJI HASTAWIRATA PUTRATAMA',
                'id_unit' => '3',
                'id_jabatan' => '32',
                'nip' => '632100021',
            ]
        );
        $user = User::create(
            [
                'name' => 'RIZKI ANANDA FIANTANA',
                'id_unit' => '3',
                'id_jabatan' => '32',
                'nip' => '632100018',
            ]
        );
        // $user = User::create(
        //     [
        //         'name' => 'ONNY CHRISTANTO',
        //         'id_unit' => '',
        //         'id_jabatan' => '',
        //         'nip' => '962200001',
        //     ]
        // );
        $user = User::create(
            [
                'name' => 'SEPTIAN WAHYUTAMA',
                'id_unit' => '6',
                'id_jabatan' => '33',
                'nip' => '631900021',
            ]
        );
        $user = User::create(
            [
                'name' => 'CHRISTYAN NOFENDHI',
                'id_unit' => '5',
                'id_jabatan' => '32',
                'nip' => '632200002',
            ]
        );
        $user = User::create(
            [
                'name' => 'SUJARWO',
                'id_unit' => '4',
                'id_jabatan' => '32',
                'nip' => '632200003',
            ]
        );
        $user = User::create(
            [
                'name' => 'FEBRI DWINANDA HERNANTO',
                'id_unit' => '2',
                'id_jabatan' => '32',
                'nip' => '632200004',
            ]
        );
        $user = User::create(
            [
                'name' => 'FITROTUL ULA',
                'id_unit' => '1',
                'id_jabatan' => '32',
                'nip' => '631900014',
            ]
        );
        $user = User::create(
            [
                'name' => 'FITROTUS SHOLIHAH',
                'id_unit' => '5',
                'id_jabatan' => '32',
                'nip' => '662100008',
            ]
        );
        $user = User::create(
            [
                'name' => 'PRISCILLA WAHYU ARMAYANTI',
                'id_unit' => '3',
                'id_jabatan' => '32',
                'nip' => '632200005',
            ]
        );
        $user = User::create(
            [
                'name' => 'GASELLA YAMANDA PUTRI WIBOWO',
                'id_unit' => '5',
                'id_jabatan' => '32',
                'nip' => '632200006',
            ]
        );
        $user = User::create(
            [
                'name' => 'AGUS SARWOKO',
                'id_unit' => '4',
                'id_jabatan' => '33',
                'nip' => '981400003',
            ]
        );
        $user = User::create(
            [
                'name' => 'MUHAMMAD RIDHO GUSTIANDRY',
                'id_unit' => '1',
                'id_jabatan' => '32',
                'nip' => '961900005',
            ]
        );
        $user = User::create(
            [
                'name' => 'ROSSITA RETNAWATI',
                'id_unit' => '1',
                'id_jabatan' => '32',
                'nip' => '961900004',
            ]
        );
        $user = User::create(
            [
                'name' => 'SHARAH PUTRI NOER ASMARAWATI',
                'id_unit' => '1',
                'id_jabatan' => '32',
                'nip' => '961800007',
            ]
        );
        $user = User::create(
            [
                'name' => 'ANDRI RINALDO SILALAHI',
                'id_unit' => '2',
                'id_jabatan' => '32',
                'nip' => '961800001',
            ]
        );
        $user = User::create(
            [
                'name' => 'BUDI DWI WAHANA',
                'id_unit' => '4',
                'id_jabatan' => '32',
                'nip' => '961600004',
            ]
        );
        $user = User::create(
            [
                'name' => 'DIDIK MISGIYANTO',
                'id_unit' => '4',
                'id_jabatan' => '32',
                'nip' => '961800006',
            ]
        );
        $user = User::create(
            [
                'name' => 'KETUT ROKHYE LUMINTANG',
                'id_unit' => '4',
                'id_jabatan' => '32',
                'nip' => '961700002',
            ]
        );
        $user = User::create(
            [
                'name' => 'DILIONO DIDIK SETYANTO',
                'id_unit' => '3',
                'id_jabatan' => '32',
                'nip' => '961800002',
            ]
        );
        $user = User::create(
            [
                'name' => 'LASNO',
                'id_unit' => '1',
                'id_jabatan' => '32',
                'nip' => '999900085',
            ]
        );
        $user = User::create(
            [
                'name' => 'MURYADI',
                'id_unit' => '1',
                'id_jabatan' => '32',
                'nip' => '999900044',
            ]
        );

        $user = User::create(
            [
                'name' => 'DAVID YUDHA ARISKA',
                'id_unit' => '2',
                'id_jabatan' => '32',
                'nip' => '991000005',
            ]
        );
        $user = User::create(
            [
                'name' => 'SEPTO TRI MARGONO',
                'id_unit' => '2',
                'id_jabatan' => '32',
                'nip' => '991200030',
            ]
        );
        $user = User::create(
            [
                'name' => 'MOCH. ABIB',
                'id_unit' => '5',
                'id_jabatan' => '32',
                'nip' => '999800027',
            ]
        );
        $user = User::create(
            [
                'name' => 'ANANG SLAMET RIYADI',
                'id_unit' => '4',
                'id_jabatan' => '32',
                'nip' => '999900079',
            ]
        );
        $user = User::create(
            [
                'name' => 'DIDIK SISWANTO',
                'id_unit' => '4',
                'id_jabatan' => '32',
                'nip' => '991700013',
            ]
        );
        $user = User::create(
            [
                'name' => 'DJAKA POERNOMO',
                'id_unit' => '4',
                'id_jabatan' => '32',
                'nip' => '999600023',
            ]
        );
        $user = User::create(
            [
                'name' => 'KUSNO',
                'id_unit' => '4',
                'id_jabatan' => '32',
                'nip' => '999900103',
            ]
        );
        $user = User::create(
            [
                'name' => 'MISRAN',
                'id_unit' => '4',
                'id_jabatan' => '32',
                'nip' => '999900099',
            ]
        );
        $user = User::create(
            [
                'name' => 'NURANI FAJAR PRIA HARDI',
                'id_unit' => '3',
                'id_jabatan' => '32',
                'nip' => '991200025',
            ]
        );
        $user = User::create(
            [
                'name' => 'SRI WIBOWO',
                'id_unit' => '4',
                'id_jabatan' => '32',
                'nip' => '999900066',
            ]
        );
        $user = User::create(
            [
                'name' => 'SUHARIOTO',
                'id_unit' => '4',
                'id_jabatan' => '32',
                'nip' => '999900059',
            ]
        );
        $user = User::create(
            [
                'name' => 'SUKARNO',
                'id_unit' => '4',
                'id_jabatan' => '32',
                'nip' => '990100003',
            ]
        );
        $user = User::create(
            [
                'name' => 'TOTOK SUJIANTO',
                'id_unit' => '4',
                'id_jabatan' => '32',
                'nip' => '999800151',
            ]
        );
        $user = User::create(
            [
                'name' => 'YATIRAN',
                'id_unit' => '4',
                'id_jabatan' => '32',
                'nip' => '999900004',
            ]
        );
        $user = User::create(
            [
                'name' => 'AISYA B. DIJI',
                'id_unit' => '3',
                'id_jabatan' => '32',
                'nip' => '991400017',
            ]
        );
        $user = User::create(
            [
                'name' => 'BAMBANG SUMARSONO',
                'id_unit' => '4',
                'id_jabatan' => '32',
                'nip' => '999600039',
            ]
        );
        $user = User::create(
            [
                'name' => 'BASUNI',
                'id_unit' => '3',
                'id_jabatan' => '32',
                'nip' => '999900064',
            ]
        );
        $user = User::create(
            [
                'name' => 'DANIA YUSNI AFRIDA',
                'id_unit' => '3',
                'id_jabatan' => '32',
                'nip' => '991200011',
            ]
        );
        $user = User::create(
            [
                'name' => 'KRISTYANTO',
                'id_unit' => '3',
                'id_jabatan' => '32',
                'nip' => '990100002',
            ]
        );
        $user = User::create(
            [
                'name' => 'SARPO',
                'id_unit' => '4',
                'id_jabatan' => '32',
                'nip' => '999400080',
            ]
        );
        $user = User::create(
            [
                'name' => 'ESHA ABRIYANTO TUTUKO',
                'id_unit' => '1',
                'id_jabatan' => '32',
                'nip' => '631800011',
            ]
        );

        // $permissions = Permission::pluck('id', 'id')->all();

        // $role->syncPermissions($permissions);

        // $user->assignRole([$role->id]);
    }
}
