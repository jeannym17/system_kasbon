<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Kasbon;
use App\Models\Kurs;
use App\Models\Jenis;
use App\Models\Pph;
use App\Models\User;
use App\Models\Verifikator;
use App\Models\Dvendor;
use App\Models\DCustomer;
use App\Models\DDinas;
use App\Models\DImpor;
use App\Models\DPajak;
use App\Models\Kelengkapan;
use App\Models\Keterangan;
use App\Models\Keterangan_detail;
use App\Models\KeteranganKasbon;
use App\Models\KodeKasbon;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KasbonVerifikatorController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:verifikator', ['only' => ['index', 'store', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index(Request $request)
    {
        $kasbon = Kasbon::all();
        $pph = PPH::all();
        $title = 'Kasbon';
        return view('vkb.index', compact('kasbon', 'title', 'pph'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function printppk($id)
    {
        $kasbon = Kasbon::find($id);

        return view('pdf.print-ppk', compact('kasbon'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Verifikator  $verifikator
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pph = PPH::all();
        $kasbon = Kasbon::find($id);
        $title = 'Kasbon';
        return view('vkb.lihat-kasbon', compact('kasbon', 'title', 'pph'));
    }

    public function show_v($id)
    {
        $pph = PPH::all();
        $kasbon = Kasbon::find($id);
        $title = 'Kasbon';
        return view('vkb.lihat-kasbon-v', compact('kasbon', 'title', 'pph'));
    }

    public function kelengkapan($id)
    {
        $kasbon = Kasbon::find($id);
        $title = 'Kasbon';
        return view('vkb.lihat-kelengkapan', compact('kasbon', 'title'));
    }

    public function kelengkapan_v($id)
    {
        $kasbon = Kasbon::find($id);
        $title = 'Kasbon';
        return view('vkb.lihat-kelengkapan-v', compact('kasbon', 'title'));
    }

    public function kelengkapan_edit($id)
    {
        $kasbon = Kasbon::find($id);
        $title = 'Kasbon';
        return view('vkb.lihat-kelengkapan-edit', compact('kasbon', 'title'));
    }

    public function dokumen($id)
    {
        $kasbon = Kasbon::find($id);
        $title = 'Kasbon';
        return view('vkb.lihat-dokumen', compact('kasbon', 'title'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Verifikator  $verifikator
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kasbon = Kasbon::find($id);
        $kb = $kasbon->id;
        $kelengkapan = Kelengkapan::where('id_kasbon', $kb)->get();

        $kodekasbon = KodeKasbon::all();
        $pph = Pph::all();
        $kurs = Kurs::all();
        $jenis = Jenis::all();
        $user = User::all();
        $title = 'Detail';
        return view('verifikator.edit', compact('title', 'kasbon', 'pph', 'kurs', 'jenis', 'user', 'kodekasbon', 'kelengkapan'));
    }

    public function info($id)
    {
        $kasbon = Kasbon::find($id);
        $kb = $kasbon->id;
        $kelengkapan = Kelengkapan::where('id_kasbon', $kb)->get();

        $kodekasbon = KodeKasbon::all();
        $pph = Pph::all();
        $kurs = Kurs::all();
        $jenis = Jenis::all();
        $user = User::all();
        $title = 'Detail';
        return view('verifikator.edit-info', compact('title', 'kasbon', 'pph', 'kurs', 'jenis', 'user', 'kodekasbon', 'kelengkapan'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVerifikatorRequest  $request
     * @param  \App\Models\Verifikator  $verifikator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kasbon = Kasbon::find($id);
        DB::transaction(function () use ($kasbon, $request, $id) {
            if ($request->iddpp or $request->iddpp1) {
                if ($kasbon->id_kurs == 42) {
                    $iddpp = Str::replace(',', '', $request->iddpp);
                    $idppn = Str::replace(',', '', $request->idppn);
                    $idpph = Str::replace(',', '', $request->idpph);
                    $total = Str::replace(',', '', $request->iddpp) + Str::replace(',', '', $request->idppn) - Str::replace(',', '', $request->idpph);
                    $ktotal = $total;
                    $konversi =  0;
                } else {
                    $iddpp = Str::replace(',', '', $request->iddpp1);
                    $idppn = 0;
                    $idpph = 0;
                    $total =  Str::replace(',', '', $request->iddpp1);
                    $konversi =  Str::replace(',', '', $request->konversi);
                    $hasilk = $total * $konversi;
                    $ktotal = Str::replace(',', '', $hasilk);
                }
            }
            if ($request->tgltempo) {
                $kasbon->update([
                    'tgltempo' => $request->Input('tgltempo'),
                    'iddpp' => Str::replace(',', '', $iddpp),
                    'idppn' => Str::replace(',', '', $idppn),
                    'id_pph' => $request->id_pph,
                    'idpph' => Str::replace(',', '', $idpph),
                    'total' => Str::replace(',', '', $total),
                    'konversi' => Str::replace(',', '', $konversi),
                    'k_iddpp' => $kasbon->iddpp,
                    'k_total' => $ktotal,
                ]);
            }

            if ($request->dv_invoice) {
                $idvendor = $kasbon->kelengkapan->dvendor->id;
                $vendor = Dvendor::find($idvendor);
                $vendor->update([
                    'dv_invoice' => $request->Input('dv_invoice'),
                    'dv_kwitansi' => $request->Input('dv_kwitansi'),
                    'dv_povendor' => $request->Input('dv_povendor'),
                    'dv_sjnvendor' => $request->Input('dv_sjnvendor'),
                    'dv_packcinglist' => $request->Input('dv_packinglist'),
                    'dv_testreport' => $request->Input('dv_testreport'),
                    'dv_bapp' => $request->Input('dv_bapp'),
                    'dv_lppb' => $request->Input('dv_lppb'),
                    'dv_ko' => $request->Input('dv_ko'),
                    'dv_spp' => $request->Input('dv_spp'),
                ]);

                $idcustomer = $kasbon->kelengkapan->dcustomer->id;
                $customer = DCustomer::find($idcustomer);
                $customer->update([
                    'dc_memointernal' => $request->Input('dc_memointernal'),
                    'dc_spph' => $request->Input('dc_spph'),
                    'dc_ko' => $request->Input('dc_ko'),
                    'dc_loi' => $request->Input('dc_loi'),
                    'dc_invoicecustom' => $request->Input('dc_invoicecustom'),
                    'dc_sjncustom' => $request->Input('dc_sjncustom'),
                ]);

                $iddinas = $kasbon->kelengkapan->ddinas->id;
                $dinas = DDinas::find($iddinas);
                $dinas->update([
                    'dd_tickettransport' => $request->Input('dd_tickettransport'),
                    'dd_notamakan' => $request->Input('dd_notamakan'),
                    'dd_boardingpass' => $request->Input('dd_boardingpass'),
                    'dd_notapenginapan' => $request->Input('dd_notapenginapan'),
                    'dd_sppd' => $request->Input('dd_sppd'),
                    'dd_lapdinas' => $request->Input('dd_lapdinas'),
                ]);

                $idimpor = $kasbon->kelengkapan->dimpor->id;
                $impor = DImpor::find($idimpor);
                $impor->update([
                    'di_pib' => $request->Input('di_pib'),
                    'di_bl' => $request->Input('di_bl'),
                    'di_com' => $request->Input('di_com'),
                    'di_coo' => $request->Input('di_coo'),
                    'di_invoicecustom' => $request->Input('di_invoicecustom'),
                    'di_sjncustom' => $request->Input('di_sjncustom'),
                ]);

                $idpajak = $kasbon->kelengkapan->dpajak->id;
                $pajak = DPajak::find($idpajak);
                $pajak->update([
                    'dp_kesesuaianfaktur' => $request->Input('dp_kesesuaianfaktur'),
                    'dp_pajakpenghasilan' => $request->Input('dp_pajakpenghasilan'),
                    'dp_suratnonpkp' => $request->Input('dp_suratnonpkp'),
                ]);
            }

            $now = Carbon::now('Asia/Jakarta');

            $keteranganID  = $kasbon->kelengkapan->keterangan->id;
            $keterangan = Keterangan::find($keteranganID);
            $keterangan->update([
                'catatan' => $request->Input('catatan'),
                'updated_at' => $now,
            ]);

            if ($request->kekurangan) {
                $kd = $kasbon->kelengkapan->keterangan->id;
                Keterangan_detail::where('id_keterangan', $kd)->delete();
                $data = $request->all();
                if ($request->kekurangan) {
                    foreach ($data['kekurangan'] as $item => $value) {
                        $data2 = array(
                            'id_keterangan' => $kd,
                            'kekurangan' => $data['kekurangan'][$item],
                            'tgl_kelengkapan' => $data['tgl_kelengkapan'][$item],
                        );
                        Keterangan_detail::create($data2);
                    }
                }
            }

            // if ($request->tgl_kelengkapan) {
            //     $kd = $kasbon->kelengkapan->keterangan->id;
            //     Keterangan_detail::where('id_keterangan', $kd)->delete();
            //     $data = $request->all();
            //     if ($request->kekurangan) {
            //         foreach ($data['kekurangan'] as $item => $value) {
            //             $data2 = array(
            //                 'id_keterangan' => $kd,
            //                 'kekurangan' => $data['kekurangan'][$item],
            //                 'tgl_kelengkapan' => $data['tgl_kelengkapan'][$item],
            //             );
            //             Keterangan_detail::create($data2);
            //         }
            //     }
            // }

            $now = Carbon::now('Asia/Jakarta');

            if ($request->status) {
                if ($kasbon->verifikasikasbon->vkb = $request->Input('status') == 'Terverifikasi') {
                    $kasbon->verifikasikasbon->vkb = $request->Input('status');
                    $kasbon->verifikasikasbon->vkb_a_2 = 'Dalam Proses';
                } elseif ($kasbon->verifikasikasbon->vkb = $request->Input('status') == 'Ditolak') {
                    $kasbon->verifikasikasbon->vkb_a_12 = $request->Input('status');
                    $kasbon->verifikasikasbon->vkb_a_1 = $request->Input('status');
                    $kasbon->verifikasikasbon->vkb = $request->Input('status');
                    $kasbon->verifikasikasbon->status = $request->Input('status');
                } else {
                    $kasbon->verifikasikasbon->vkb = $request->Input('status');
                    $kasbon->verifikasikasbon->status =  $request->Input('status');
                }
                $kasbon->verifikasikasbon->tgl_vkb = $now;
                $kasbon->verifikasikasbon->updated_at = $now;
                $kasbon->verifikasikasbon->id_vkb = Auth::user()->id;
                $kasbon->verifikasikasbon->save();
            }
        });

        return redirect()->route('vkb.index')->with('success', 'Kasbon updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Verifikator  $verifikator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Verifikator $verifikator)
    {
        //
    }

    public function cek_kasbon($id)
    {
        $kasbon = Kasbon::find($id);

        $title = 'Detail';

        return view('vkb.cek_kasbon', compact('title', 'kasbon'));
    }

    public function cek_kasbon_edit($id)
    {
        $kasbon = Kasbon::find($id);
        $detail = KeteranganKasbon::where('id_kasbon', $id)->get();
        $title = 'Detail';
        return view('vkb.cek_kasbon_edit', compact('title', 'kasbon', 'detail'));
    }

    public function store(Request $request)
    {
        $id = $request->id;
        $kasbon = Kasbon::find($id);

        $cekdok = '1';

        DB::transaction(function () use ($kasbon, $request, $id) {

            if ($request->iddpp) {
                if ($kasbon->id_kurs == 42) {
                    $iddpp = Str::replace(',', '', $request->iddpp);
                    $idppn = Str::replace(',', '', $request->idppn);
                    $idpph = Str::replace(',', '', $request->idpph);
                    $total = Str::replace(',', '', $request->iddpp) + Str::replace(',', '', $request->idppn) - Str::replace(',', '', $request->idpph);
                    $ktotal = $total;
                    $konversi =  0;
                } else {
                    if ($request->konversi) {
                        $iddpp = Str::replace(',', '', $request->iddpp1);
                        $idppn = 0;
                        $idpph = 0;
                        $total =  Str::replace(',', '', $request->iddpp1);
                        $konversi =  Str::replace(',', '', $request->konversi);
                        $hasilk = $total * $konversi;
                        $ktotal = Str::replace(',', '', $hasilk);
                    } else {
                        $iddpp = Str::replace(',', '', $request->iddpp1);
                        $idppn = 0;
                        $idpph = 0;
                        $total = $kasbon->total;
                        $ktotal = $kasbon->k_total;
                    }
                }
            }
            if ($request->tgltempo) {
                $kasbon->update([
                    'tgltempo' => $request->Input('tgltempo'),
                    'iddpp' => Str::replace(',', '', $iddpp),
                    'idppn' => Str::replace(',', '', $idppn),
                    'id_pph' => $request->id_pph,
                    'idpph' => Str::replace(',', '', $idpph),
                    'total' => Str::replace(',', '', $total),
                    'konversi' => Str::replace(',', '', $konversi),
                    'k_iddpp' => $kasbon->iddpp,
                    'k_total' => $ktotal,
                ]);
            }

            if ($request->dv_invoice) {
                $idvendor = $kasbon->kelengkapan->dvendor->id;
                $vendor = Dvendor::find($idvendor);
                $vendor->update([
                    'dv_invoice' => $request->Input('dv_invoice'),
                    'dv_kwitansi' => $request->Input('dv_kwitansi'),
                    'dv_povendor' => $request->Input('dv_povendor'),
                    'dv_sjnvendor' => $request->Input('dv_sjnvendor'),
                    'dv_packcinglist' => $request->Input('dv_packinglist'),
                    'dv_testreport' => $request->Input('dv_testreport'),
                    'dv_bapp' => $request->Input('dv_bapp'),
                    'dv_lppb' => $request->Input('dv_lppb'),
                    'dv_ko' => $request->Input('dv_ko'),
                    'dv_spp' => $request->Input('dv_spp'),
                ]);

                $idcustomer = $kasbon->kelengkapan->dcustomer->id;
                $customer = DCustomer::find($idcustomer);
                $customer->update([
                    'dc_memointernal' => $request->Input('dc_memointernal'),
                    'dc_spph' => $request->Input('dc_spph'),
                    'dc_ko' => $request->Input('dc_ko'),
                    'dc_loi' => $request->Input('dc_loi'),
                    'dc_invoicecustom' => $request->Input('dc_invoicecustom'),
                    'dc_sjncustom' => $request->Input('dc_sjncustom'),
                ]);

                $iddinas = $kasbon->kelengkapan->ddinas->id;
                $dinas = DDinas::find($iddinas);
                $dinas->update([
                    'dd_tickettransport' => $request->Input('dd_tickettransport'),
                    'dd_notamakan' => $request->Input('dd_notamakan'),
                    'dd_boardingpass' => $request->Input('dd_boardingpass'),
                    'dd_notapenginapan' => $request->Input('dd_notapenginapan'),
                    'dd_sppd' => $request->Input('dd_sppd'),
                    'dd_lapdinas' => $request->Input('dd_lapdinas'),
                ]);

                $idimpor = $kasbon->kelengkapan->dimpor->id;
                $impor = DImpor::find($idimpor);
                $impor->update([
                    'di_pib' => $request->Input('di_pib'),
                    'di_bl' => $request->Input('di_bl'),
                    'di_com' => $request->Input('di_com'),
                    'di_coo' => $request->Input('di_coo'),
                    'di_invoicecustom' => $request->Input('di_invoicecustom'),
                    'di_sjncustom' => $request->Input('di_sjncustom'),
                ]);

                $idpajak = $kasbon->kelengkapan->dpajak->id;
                $pajak = DPajak::find($idpajak);
                $pajak->update([
                    'dp_kesesuaianfaktur' => $request->Input('dp_kesesuaianfaktur'),
                    'dp_pajakpenghasilan' => $request->Input('dp_pajakpenghasilan'),
                    'dp_suratnonpkp' => $request->Input('dp_suratnonpkp'),
                ]);
            }

            $keteranganID = Keterangan::insertGetId([

                'catatan' => $request->Input('catatan'),
            ]);

            if ($request->kekurangan) {
                $kd = $kasbon->kelengkapan->keterangan->id;
                Keterangan_detail::where('id_keterangan', $kd)->delete();
                $data = $request->all();
                if ($request->kekurangan) {
                    foreach ($data['kekurangan'] as $item => $value) {
                        $data2 = array(
                            'id_keterangan' => $kd,
                            'kekurangan' => $data['kekurangan'][$item],
                        );
                        Keterangan_detail::create($data2);
                    }
                }
            }
            $now = Carbon::now('Asia/Jakarta');

            if ($request->status) {
                if ($kasbon->verifikasikasbon->vkb = $request->Input('status') == 'Terverifikasi') {
                    $kasbon->verifikasikasbon->vkb = $request->Input('status');
                    $kasbon->verifikasikasbon->vkb_a_2 = 'Dalam Proses';
                } elseif ($kasbon->verifikasikasbon->vkb = $request->Input('status') == 'Ditolak') {
                    $kasbon->verifikasikasbon->vkb_a_12 = $request->Input('status');
                    $kasbon->verifikasikasbon->vkb_a_1 = $request->Input('status');
                    $kasbon->verifikasikasbon->vkb = $request->Input('status');
                    $kasbon->verifikasikasbon->status = $request->Input('status');
                } else {
                    $kasbon->verifikasikasbon->vkb = $request->Input('status');
                    $kasbon->verifikasikasbon->status =  $request->Input('status');
                }
                $kasbon->verifikasikasbon->tgl_vkb = $now;
                $kasbon->verifikasikasbon->updated_at = $now;
                $kasbon->verifikasikasbon->id_vkb = Auth::user()->id;
                $kasbon->verifikasikasbon->save();
            }
        });

        return redirect()->route('vkb.index')
            ->with('success', 'Kasbon berhasil diverifikasi');
    }
}
