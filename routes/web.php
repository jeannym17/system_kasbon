<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SPPDController;
use App\Http\Controllers\KasbonController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\NonkasbonController;
use App\Http\Controllers\PertanggunganController;
use App\Http\Controllers\ProfileController;


use App\Http\Controllers\KasbonAtasanUser1Controller;
use App\Http\Controllers\KasbonAtasanUser2Controller;
use App\Http\Controllers\KasbonAtasanUser3Controller;
use App\Http\Controllers\KasbonVerifikatorController;
use App\Http\Controllers\KasbonAtasanVerifikator1Controller;
use App\Http\Controllers\KasbonAtasanVerifikator2Controller;
use App\Http\Controllers\KasbonAtasanVerifikator3Controller;

use App\Http\Controllers\PertanggunganAtasanUser1Controller;
use App\Http\Controllers\PertanggunganAtasanUser2Controller;
use App\Http\Controllers\PertanggunganAtasanUser3Controller;
use App\Http\Controllers\PertanggunganVerifikatorController;
use App\Http\Controllers\PertanggunganAtasanVerifikator1Controller;
use App\Http\Controllers\PertanggunganAtasanVerifikator2Controller;
use App\Http\Controllers\PertanggunganAtasanVerifikator3Controller;

use App\Http\Controllers\NonKasbonAtasanUser1Controller;
use App\Http\Controllers\NonKasbonAtasanUser2Controller;
use App\Http\Controllers\NonKasbonAtasanUser3Controller;
use App\Http\Controllers\NonKasbonVerifikatorController;
use App\Http\Controllers\NonKasbonAtasanVerifikator1Controller;
use App\Http\Controllers\NonKasbonAtasanVerifikator2Controller;
use App\Http\Controllers\NonKasbonAtasanVerifikator3Controller;

use App\Http\Controllers\MonitoringSpController;
use App\Http\Controllers\MonitoringKasbonController;
use App\Http\Controllers\MonitoringNonKasbonController;
use App\Http\Controllers\MonitoringPertanggunganController;
use App\Http\Controllers\ExportExcelController;
use App\Http\Controllers\PDFController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('units', UnitController::class);
    Route::resource('kasbon', KasbonController::class);
    Route::resource('nonkasbon', NonkasbonController::class);
    Route::resource('mkb', MonitoringKasbonController::class);
    Route::resource('mkp', MonitoringPertanggunganController::class);
    Route::resource('mnk', MonitoringNonKasbonController::class);
    Route::resource('vnk', NonkasbonVerifikatorController::class);
    Route::resource('vnk-atasan-user-1', NonKasbonAtasanUser1Controller::class);
    Route::resource('vnk-atasan-user-2', NonKasbonAtasanUser2Controller::class);
    Route::resource('vnk-atasan-user-3', NonKasbonAtasanUser3Controller::class);
    Route::resource('vnk-atasan-verifikator-1', NonKasbonAtasanVerifikator1Controller::class);
    Route::resource('vnk-atasan-verifikator-2', NonKasbonAtasanVerifikator2Controller::class);
    Route::resource('vnk-atasan-verifikator-3', NonKasbonAtasanVerifikator3Controller::class);
    Route::resource('vkb', KasbonVerifikatorController::class);
    Route::resource('vkb-atasan-user-1', KasbonAtasanUser1Controller::class);
    Route::resource('vkb-atasan-user-2', KasbonAtasanUser2Controller::class);
    Route::resource('vkb-atasan-user-3', KasbonAtasanUser3Controller::class);
    Route::resource('vkb-atasan-verifikator-1', KasbonAtasanVerifikator1Controller::class);
    Route::resource('vkb-atasan-verifikator-2', KasbonAtasanVerifikator2Controller::class);
    Route::resource('vkb-atasan-verifikator-3', KasbonAtasanVerifikator3Controller::class);
    Route::resource('vkp', PertanggunganVerifikatorController::class);
    Route::resource('vkp-atasan-user-1', PertanggunganAtasanUser1Controller::class);
    Route::resource('vkp-atasan-user-2', PertanggunganAtasanUser2Controller::class);
    Route::resource('vkp-atasan-user-3', PertanggunganAtasanUser3Controller::class);
    Route::resource('vkp-atasan-verifikator-1', PertanggunganAtasanVerifikator1Controller::class);
    Route::resource('vkp-atasan-verifikator-2', PertanggunganAtasanVerifikator2Controller::class);
    Route::resource('vkp-atasan-verifikator-3', PertanggunganAtasanVerifikator3Controller::class);
    Route::resource('pertanggungan', PertanggunganController::class);
    Route::resource('sppd', SPPDController::class);
    Route::resource('profile', ProfileController::class);
});

Route::controller(KasbonController::class)->group(function () {
    // Route::get('kasbonexport', [KasbonController::class, 'kasbonexport'])->name('kasbonexport');
    Route::get('/kasbon/generatePDF/{kasbon}', [KasbonController::class, 'generatePDF'])->name('kasbon.generatePDF');
    Route::get('/kasbon/printppkuser/{kasbon}', [KasbonController::class, 'printppkuser'])->name('kasbon.printppkuser');
    Route::get('/kasbon/printsp1/{kasbon}', [KasbonController::class, 'printsp1'])->name('kasbon.printsp1');
    Route::get('/kasbon/printsp2/{kasbon}', [KasbonController::class, 'printsp2'])->name('kasbon.printsp2');
    Route::get('/kasbon/printsp3/{kasbon}', [KasbonController::class, 'printsp3'])->name('kasbon.printsp3');
    Route::post('/kasbon/findUser', [KasbonController::class, 'findUser'])->name('kasbon.findUser');
});

Route::controller(NonkasbonController::class)->group(function () {
    Route::post('/nonkasbon/findUser', [NonkasbonController::class, 'findUser'])->name('nonkasbon.findUser');
});

Route::controller(KasbonVerifikatorController::class)->group(function () {
    // Route::get('kasbonexport', [KasbonVerifikatorController::class, 'kasbonexport'])->name('kasbonexport');
    Route::get('/vkb/printppk/{kasbon}', [KasbonVerifikatorController::class, 'printppk'])->name('vkb.printppk');
});

Route::controller(ExportExcelController::class)->group(function () {
    Route::get('kasbonexport', [ExportExcelController::class, 'kasbonexport'])->name('kasbonexport');
    Route::get('nonkasbonexport', [ExportExcelController::class, 'nonkasbonexport'])->name('nonkasbonexport');
    Route::get('sppdexport', [ExportExcelController::class, 'sppdexport'])->name('sppdexport');
    Route::get('pertanggunganexport', [ExportExcelController::class, 'pertanggunganexport'])->name('pertanggunganexport');
});

Route::controller(KasbonAtasanUser1Controller::class)->group(function () {
    Route::get('/vkb-atasan-user-1/kelengkapan/{kasbon}', [KasbonAtasanUser1Controller::class, 'kelengkapan'])->name('vkb-atasan-user-1.kelengkapan');
    Route::get('/vkb-atasan-user-1/dokumen/{kasbon}', [KasbonAtasanUser1Controller::class, 'dokumen'])->name('vkb-atasan-user-1.dokumen');
});

Route::controller(KasbonAtasanUser2Controller::class)->group(function () {
    Route::get('/vkb-atasan-user-2/kelengkapan/{kasbon}', [KasbonAtasanUser2Controller::class, 'kelengkapan'])->name('vkb-atasan-user-2.kelengkapan');
    Route::get('/vkb-atasan-user-2/dokumen/{kasbon}', [KasbonAtasanUser2Controller::class, 'dokumen'])->name('vkb-atasan-user-2.dokumen');
});

Route::controller(KasbonAtasanUser3Controller::class)->group(function () {
    Route::get('/vkb-atasan-user-3/kelengkapan/{kasbon}', [KasbonAtasanUser3Controller::class, 'kelengkapan'])->name('vkb-atasan-user-3.kelengkapan');
    Route::get('/vkb-atasan-user-3/dokumen/{kasbon}', [KasbonAtasanUser3Controller::class, 'dokumen'])->name('vkb-atasan-user-3.dokumen');
});

Route::controller(KasbonVerifikatorController::class)->group(function () {
    Route::get('/vkb/kelengkapan/{kasbon}', [KasbonVerifikatorController::class, 'kelengkapan'])->name('vkb.kelengkapan');
    Route::get('/vkb/kelengkapan_v/{kasbon}', [KasbonVerifikatorController::class, 'kelengkapan_v'])->name('vkb.kelengkapan_v');
    Route::get('/vkb/show_v/{kasbon}', [KasbonVerifikatorController::class, 'show_v'])->name('vkb.show_v');
    Route::get('/vkb/kelengkapan_edit/{kasbon}', [KasbonVerifikatorController::class, 'kelengkapan_edit'])->name('vkb.kelengkapan_edit');
    Route::get('/vkb/dokumen/{kasbon}', [KasbonVerifikatorController::class, 'dokumen'])->name('vkb.dokumen');
});

Route::controller(KasbonAtasanVerifikator1Controller::class)->group(function () {
    Route::get('/vkb-atasan-verifikator-1/kelengkapan_v/{kasbon}', [KasbonAtasanVerifikator1Controller::class, 'kelengkapan_v'])->name('vkb-atasan-verifikator-1.kelengkapan_v');
    Route::get('/vkb-atasan-verifikator-1/show_v/{kasbon}', [KasbonAtasanVerifikator1Controller::class, 'show_v'])->name('vkb-atasan-verifikator-1.show_v');
    Route::get('/vkb-atasan-verifikator-1/dokumen/{kasbon}', [KasbonAtasanVerifikator1Controller::class, 'dokumen'])->name('vkb-atasan-verifikator-1.dokumen');
});

Route::controller(KasbonAtasanVerifikator2Controller::class)->group(function () {
    Route::get('/vkb-atasan-verifikator-2/kelengkapan_v/{kasbon}', [KasbonAtasanVerifikator2Controller::class, 'kelengkapan_v'])->name('vkb-atasan-verifikator-2.kelengkapan_v');
    Route::get('/vkb-atasan-verifikator-2/show_v/{kasbon}', [KasbonAtasanVerifikator2Controller::class, 'show_v'])->name('vkb-atasan-verifikator-2.show_v');
    Route::get('/vkb-atasan-verifikator-2/dokumen/{kasbon}', [KasbonAtasanVerifikator2Controller::class, 'dokumen'])->name('vkb-atasan-verifikator-2.dokumen');
});

Route::controller(KasbonAtasanVerifikator3Controller::class)->group(function () {
    Route::get('/vkb-atasan-verifikator-3/kelengkapan_v/{kasbon}', [KasbonAtasanVerifikator3Controller::class, 'kelengkapan_v'])->name('vkb-atasan-verifikator-3.kelengkapan_v');
    Route::get('/vkb-atasan-verifikator-3/show_v/{kasbon}', [KasbonAtasanVerifikator3Controller::class, 'show_v'])->name('vkb-atasan-verifikator-3.show_v');
    Route::get('/vkb-atasan-verifikator-3/dokumen/{kasbon}', [KasbonAtasanVerifikator3Controller::class, 'dokumen'])->name('vkb-atasan-verifikator-3.dokumen');
});

Route::controller(PertanggunganAtasanUser1Controller::class)->group(function () {
    Route::get('/vkp-atasan-user-1/kelengkapan_v/{pertanggungan}', [PertanggunganAtasanUser1Controller::class, 'kelengkapan_v'])->name('vkp-atasan-user-1.kelengkapan_v');
    Route::get('/vkp-atasan-user-1/show_v/{pertanggungan}', [PertanggunganAtasanUser1Controller::class, 'show_v'])->name('vkp-atasan-user-1.show_v');
});

Route::controller(PertanggunganAtasanUser2Controller::class)->group(function () {
    Route::get('/vkp-atasan-user-2/kelengkapan_v/{pertanggungan}', [PertanggunganAtasanUser2Controller::class, 'kelengkapan_v'])->name('vkp-atasan-user-2.kelengkapan_v');
    Route::get('/vkp-atasan-user-2/show_v/{pertanggungan}', [PertanggunganAtasanUser2Controller::class, 'show_v'])->name('vkp-atasan-user-2.show_v');
});

Route::controller(PertanggunganAtasanUser3Controller::class)->group(function () {
    Route::get('/vkp-atasan-user-3/kelengkapan_v/{pertanggungan}', [PertanggunganAtasanUser3Controller::class, 'kelengkapan_v'])->name('vkp-atasan-user-3.kelengkapan_v');
    Route::get('/vkp-atasan-user-3/show_v/{pertanggungan}', [PertanggunganAtasanUser3Controller::class, 'show_v'])->name('vkp-atasan-user-3.show_v');
});

Route::controller(PertanggunganVerifikatorController::class)->group(function () {
    Route::get('/vkp/kelengkapan/{pertanggungan}', [PertanggunganVerifikatorController::class, 'kelengkapan'])->name('vkp.kelengkapan');
    Route::get('/vkp/kelengkapan_v/{pertanggungan}', [PertanggunganVerifikatorController::class, 'kelengkapan_v'])->name('vkp.kelengkapan_v');
    Route::get('/vkp/show_v/{pertanggungan}', [PertanggunganVerifikatorController::class, 'show_v'])->name('vkp.show_v');
    Route::get('/vkp/kelengkapan_edit/{pertanggungan}', [PertanggunganVerifikatorController::class, 'kelengkapan_edit'])->name('vkp.kelengkapan_edit');
});

Route::controller(PertanggunganAtasanVerifikator1Controller::class)->group(function () {
    Route::get('/vkp-atasan-verifikator-1/kelengkapan_v/{pertanggungan}', [PertanggunganAtasanVerifikator1Controller::class, 'kelengkapan_v'])->name('vkp-atasan-verifikator-1.kelengkapan_v');
    Route::get('/vkp-atasan-verifikator-1/show_v/{pertanggungan}', [PertanggunganAtasanVerifikator1Controller::class, 'show_v'])->name('vkp-atasan-verifikator-1.show_v');
});

Route::controller(PertanggunganAtasanVerifikator2Controller::class)->group(function () {
    Route::get('/vkp-atasan-verifikator-2/kelengkapan_v/{pertanggungan}', [PertanggunganAtasanVerifikator2Controller::class, 'kelengkapan_v'])->name('vkp-atasan-verifikator-2.kelengkapan_v');
    Route::get('/vkp-atasan-verifikator-2/show_v/{pertanggungan}', [PertanggunganAtasanVerifikator2Controller::class, 'show_v'])->name('vkp-atasan-verifikator-2.show_v');
});

Route::controller(PertanggunganAtasanVerifikator3Controller::class)->group(function () {
    Route::get('/vkp-atasan-verifikator-3/kelengkapan_v/{pertanggungan}', [PertanggunganAtasanVerifikator3Controller::class, 'kelengkapan_v'])->name('vkp-atasan-verifikator-3.kelengkapan_v');
    Route::get('/vkp-atasan-verifikator-3/show_v/{pertanggungan}', [PertanggunganAtasanVerifikator3Controller::class, 'show_v'])->name('vkp-atasan-verifikator-3.show_v');
});

Route::controller(NonKasbonAtasanUser1Controller::class)->group(function () {
    Route::get('/vnk-atasan-user-1/kelengkapan/{nonkasbon}', [NonKasbonAtasanUser1Controller::class, 'kelengkapan'])->name('vnk-atasan-user-1.kelengkapan');
});

Route::controller(NonKasbonAtasanUser2Controller::class)->group(function () {
    Route::get('/vnk-atasan-user-2/kelengkapan/{nonkasbon}', [NonKasbonAtasanUser2Controller::class, 'kelengkapan'])->name('vnk-atasan-user-2.kelengkapan');
});

Route::controller(NonKasbonAtasanUser3Controller::class)->group(function () {
    Route::get('/vnk-atasan-user-3/kelengkapan/{nonkasbon}', [NonKasbonAtasanUser3Controller::class, 'kelengkapan'])->name('vnk-atasan-user-3.kelengkapan');
});

Route::controller(NonkasbonVerifikatorController::class)->group(function () {
    Route::get('/vnk/kelengkapan/{nonkasbon}', [NonkasbonVerifikatorController::class, 'kelengkapan'])->name('vnk.kelengkapan');
    Route::get('/vnk/kelengkapan_v/{nonkasbon}', [NonkasbonVerifikatorController::class, 'kelengkapan_v'])->name('vnk.kelengkapan_v');
    Route::get('/vnk/show_v/{nonkasbon}', [NonkasbonVerifikatorController::class, 'show_v'])->name('vnk.show_v');
    Route::get('/vnk/kelengkapan_edit/{nonkasbon}', [NonkasbonVerifikatorController::class, 'kelengkapan_edit'])->name('vnk.kelengkapan_edit');
});

Route::controller(NonKasbonAtasanVerifikator1Controller::class)->group(function () {
    Route::get('/vnk-atasan-verifikator-1/kelengkapan/{nonkasbon}', [NonKasbonAtasanVerifikator1Controller::class, 'kelengkapan'])->name('vnk-atasan-verifikator-1.kelengkapan');
});

Route::controller(NonKasbonAtasanVerifikator2Controller::class)->group(function () {
    Route::get('/vnk-atasan-verifikator-2/kelengkapan/{nonkasbon}', [NonKasbonAtasanVerifikator2Controller::class, 'kelengkapan'])->name('vnk-atasan-verifikator-2.kelengkapan');
});

Route::controller(NonKasbonAtasanVerifikator3Controller::class)->group(function () {
    Route::get('/vnk-atasan-verifikator-3/kelengkapan/{nonkasbon}', [NonKasbonAtasanVerifikator3Controller::class, 'kelengkapan'])->name('vnk-atasan-verifikator-3.kelengkapan');
});
// Route::controller(KasbonVerifikatorController::class)->group(function () {
//     Route::get('/vkb/cek_kasbon/{kasbon}', [KasbonVerifikatorController::class, 'cek_kasbon'])->name('vkb.cek_kasbon');
//     Route::get('/vkb/cek_kasbon_edit/{kasbon}', [KasbonVerifikatorController::class, 'cek_kasbon_edit'])->name('vkb.cek_kasbon_edit');
// });

// Route::controller(KasbonAtasanVerifikator1Controller::class)->group(function () {
//     Route::get('/vkb-atasan-verifikator-1/cek_kasbon/{kasbon}', [KasbonAtasanVerifikator1Controller::class, 'cek_kasbon'])->name('vkb-atasan-verifikator-1.cek_kasbon');
//     Route::get('/vkb-atasan-verifikator-1/cek_kasbon_edit/{kasbon}', [KasbonAtasanVerifikator1Controller::class, 'cek_kasbon_edit'])->name('vkb-atasan-verifikator-1.cek_kasbon_edit');
// });

// Route::controller(PertanggunganVerifikatorController::class)->group(function () {
//     Route::get('vkp/cek_pertanggungan/{pertanggungan}', [PertanggunganVerifikatorController::class, 'cek_pertanggungan'])->name('vkp.cek_pertanggungan');
//     Route::get('vkp/cek_pertanggungan_edit/{pertanggungan}', [PertanggunganVerifikatorController::class, 'cek_pertanggungan_edit'])->name('vkp.cek_pertanggungan_edit');
// });

// Route::controller(KasbonAtasanUser1Controller::class)->group(function () {
//     Route::get('/vkb-atasan/cek_kasbon/{kasbon}', [KasbonAtasanUser1Controller::class, 'cek_kasbon'])->name('vkb-atasan.cek_kasbon');
//     Route::get('/vkb-atasan/cek_kasbon_edit/{kasbon}', [KasbonAtasanUser1Controller::class, 'cek_kasbon_edit'])->name('vkb-atasan.cek_kasbon_edit');
// });

// Route::controller(NonKasbonAtasanUser1Controller::class)->group(function () {
//     Route::get('/vnk-atasan/cek_nonkasbon/{nonkasbon}', [NonKasbonAtasanUser1Controller::class, 'cek_nonkasbon'])->name('vnk-atasan.cek_nonkasbon');
//     Route::get('/vnk-atasan/cek_nonkasbon_edit/{nonkasbon}', [NonKasbonAtasanUser1Controller::class, 'cek_nonkasbon_edit'])->name('vnk-atasan.cek_nonkasbon_edit');
// });

// Route::controller(NonKasbonAtasanVerifikator1Controller::class)->group(function () {
//     Route::get('/vnk-atasan-verifikator-1/cek_nonkasbon/{nonkasbon}', [NonKasbonAtasanVerifikator1Controller::class, 'cek_nonkasbon'])->name('vnk-atasan-verifikator-1.cek_nonkasbon');
//     Route::get('/vnk-atasan-verifikator-1/cek_nonkasbon_edit/{nonkasbon}', [NonKasbonAtasanVerifikator1Controller::class, 'cek_nonkasbon_edit'])->name('vnk-atasan-verifikator-1.cek_nonkasbon_edit');
// });
// Route::controller(NonKasbonVerifikatorController::class)->group(function () {
//     Route::get('/vnk/cek_nonkasbon/{nonkasbon}', [NonKasbonVerifikatorController::class, 'cek_nonkasbon'])->name('vnk.cek_nonkasbon');
//     Route::get('/vnk/cek_nonkasbon_edit/{nonkasbon}', [NonKasbonVerifikatorController::class, 'cek_nonkasbon_edit'])->name('vnk.cek_nonkasbon_edit');
// });

// Route::controller(PertanggunganAtasanUser1Controller::class)->group(function () {
//     Route::get('/vkp-atasan/cek_pertanggungan/{pertanggungan}', [PertanggunganAtasanUser1Controller::class, 'cek_pertanggungan'])->name('vkp-atasan.cek_pertanggungan');
//     Route::get('/vkp-atasan/cek_pertanggungan_edit/{pertanggungan}', [PertanggunganAtasanUser1Controller::class, 'cek_pertanggungan_edit'])->name('vkp-atasan.cek_pertanggungan_edit');
// });

// Route::controller(PertanggunganAtasanVerifikator1Controller::class)->group(function () {
//     Route::get('/vkp-atasan-verifikator-1/cek_pertanggungan/{pertanggungan}', [PertanggunganAtasanVerifikator1Controller::class, 'cek_pertanggungan'])->name('vkp-atasan-verifikator-1.cek_pertanggungan');
//     Route::get('/vkp-atasan-verifikator-1/cek_pertanggungan_edit/{pertanggungan}', [PertanggunganAtasanVerifikator1Controller::class, 'cek_pertanggungan_edit'])->name('vkp-atasan-verifikator-1.cek_pertanggungan_edit');
// });

Route::controller(PertanggunganController::class)->group(function () {
    Route::get('/pertanggungan/insert/{kasbons}', [PertanggunganController::class, 'insert'])->name('pertanggungan.insert');
    Route::get('/pertanggungan/generatePDF/{pertanggungan}', [PertanggunganController::class, 'generatePDF'])->name('pertanggungan.generatePDF');
});

Route::controller(NonkasbonController::class)->group(function () {
    Route::get('/nonkasbon/generatePDF/{nonkasbon}', [NonkasbonController::class, 'generatePDF'])->name('nonkasbon.generatePDF');
});

Route::controller(MonitoringSpController::class)->group(function () {
    Route::get('/msp/index', [MonitoringSpController::class, 'index'])->name('msp.index');
    Route::post('/msp/update', [MonitoringSpController::class, 'update'])->name('msp.update');
});
