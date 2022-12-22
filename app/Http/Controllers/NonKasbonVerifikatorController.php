<?php

namespace App\Http\Controllers;

use App\Models\DokumenNK;
use App\Models\DokumenNKD;
use App\Models\NonKasbon;
use App\Models\Pph;
use App\Models\VerifikasiNonKasbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;

class NonKasbonVerifikatorController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:verifikator', ['only' => ['index', 'store', 'create', 'edit', 'update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pph = Pph::all();
        $nonkasbon = nonkasbon::all();

        $title = 'Non Kasbon';
        return view('nonkasbon.index', compact('nonkasbon', 'title', 'pph'))->with('i', (request()->input('page', 1) - 1) * 5);
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
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVerifikasiNonKasbonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->id;

        DB::transaction(function () use ($request, $id) {
            $nonkasbon = nonkasbon::find($id);
            if ($request->iddpp) {
                if ($nonkasbon->id_kurs == 42) {
                    $iddpp = $request->iddpp;
                    $idppn = $request->iddpp;
                    $idpph = $request->idpph;
                    $total = $request->iddpp + $request->iddpp - $request->idpph;
                } else {
                    $iddpp = $request->iddpp1;
                    $idppn = $request->idppn1;
                    $idpph = $request->idpph1;
                    $konversi = $request->konversi;
                    $total = ($request->iddpp1 * $konversi) + $request->idppn1 - $request->idpph1;
                }
                $nonkasbon->update([
                    'iddpp' => $iddpp,
                    'idppn' => $idppn,
                    'id_pph' => $request->Input('id_pph'),
                    'idpph' => $idpph,
                    'total' => $nonkasbon->total,
                    'k_total' => $total,
                ]);
            }
            $now = Carbon::now('Asia/Jakarta');
            if ($request->status) {
                if ($nonkasbon->verifikasinonkasbon->vnk = $request->Input('status') == 'Terverifikasi') {
                    $nonkasbon->verifikasinonkasbon->vnk_a_2 = 'Dalam Proses';
                    $nonkasbon->verifikasinonkasbon->vnk = $request->Input('status');
                } elseif ($nonkasbon->verifikasinonkasbon->vkb = $request->Input('status') == 'Ditolak') {
                    $nonkasbon->verifikasinonkasbon->vkb = $request->Input('status');
                    $nonkasbon->verifikasinonkasbon->vkb_a_1 = $request->Input('status');
                    $nonkasbon->verifikasinonkasbon->vkb_a_12 = $request->Input('status');
                    $nonkasbon->verifikasinonkasbon->status = $request->Input('status');
                } else {
                    $nonkasbon->verifikasinonkasbon->vnk = $request->Input('status');
                    $nonkasbon->verifikasinonkasbon->status = $request->Input('status');
                }
                $nonkasbon->verifikasinonkasbon->update([
                    'id_vnk' => Auth::user()->id,
                    'tgl_vnk' => $now,
                    'updated_at' =>  $now
                ]);
            }

            if ($request->total) {
                $doknkID = DokumenNK::insertGetId([
                    'id_nonkasbon' => $nonkasbon->id,
                    'total' => $request->Input('total'),
                    'catatan' => $request->Input('catatan'),
                    'updated_at' =>  $now,
                    'created_at' =>  $now

                ]);
                foreach ($request->dokumen as $key => $dokumen) {
                    $data = new DokumenNKD();
                    $nominal = $request->input('nominal');
                    $data->id_dnk = $doknkID;
                    $data->dokumen = $dokumen;
                    $data->nominal = $nominal[$key];
                    $data->save();
                }
            }
        });
        return redirect()->route('nonkasbon.index')->with('success', 'User updated successfully');
    }

    public function update(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $now = Carbon::now('Asia/Jakarta');
            $nonkasbon = nonkasbon::find($id);
            if ($request->iddpp) {
                if ($nonkasbon->id_kurs == 42) {
                    $iddpp = Str::replace(',', '', $request->iddpp);
                    $idppn = Str::replace(',', '', $request->idppn);
                    $idpph = Str::replace(',', '', $request->idpph);
                    $total = Str::replace(',', '', $request->iddpp) + Str::replace(',', '', $request->idppn) - Str::replace(',', '', $request->idpph);
                    $ktotal = $total;
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
                        $total = $nonkasbon->total;
                        $ktotal = $nonkasbon->k_total;
                    }
                }
            }
            if ($request->iddpp) {
                $nonkasbon->update([
                    'iddpp' => $iddpp,
                    'idppn' => $idppn,
                    'id_pph' => $request->Input('id_pph'),
                    'idpph' => $idpph,
                    'total' => $nonkasbon->total,
                    'k_total' => $ktotal,
                ]);
            }

            if ($request->status) {
                if ($nonkasbon->verifikasinonkasbon->vnk = $request->Input('status') == 'Terverifikasi') {
                    $nonkasbon->verifikasinonkasbon->vnk_a_2 = 'Dalam Proses';
                    $nonkasbon->verifikasinonkasbon->vnk = $request->Input('status');
                } elseif ($nonkasbon->verifikasinonkasbon->vnk = $request->Input('status') == 'Ditolak') {
                    $nonkasbon->verifikasinonkasbon->vnk = $request->Input('status');
                    $nonkasbon->verifikasinonkasbon->vnk_a_1 = $request->Input('status');
                    $nonkasbon->verifikasinonkasbon->vnk_a_12 = $request->Input('status');
                    $nonkasbon->verifikasinonkasbon->status = $request->Input('status');
                } else {
                    $nonkasbon->verifikasinonkasbon->vnk = $request->Input('status');
                    $nonkasbon->verifikasinonkasbon->status = $request->Input('status');
                }
                $nonkasbon->verifikasinonkasbon->update([
                    'id_vnk' => Auth::user()->id,
                    'tgl_vnk' => $now,
                    'updated_at' =>  $now
                ]);
            }

            // if ($request->catatan) {

            // }
            if (isset($nonkasbon->dokumennk->id)) {
                if ($request->dokumen) {
                    $iddnk = $nonkasbon->dokumennk->id;
                    $dnk = DokumenNK::find($iddnk);
                    $dnk->update([
                        'id_nonkasbon' => $nonkasbon->id,
                        'total' => $request->Input('total'),
                        'catatan' => $request->Input('catatan')
                    ]);
                    DokumenNKD::where('id_dnk', $iddnk)->delete();
                    $data = $request->all();
                    if ($request->dokumen) {
                        foreach ($data['dokumen'] as $item => $value) {
                            $data2 = array(
                                'id_dnk' =>  $iddnk,
                                'dokumen' => $data['dokumen'][$item],
                                'nominal' => $data['nominal'][$item],
                            );
                            DokumenNKD::create($data2);
                        }
                    }
                }
            } else {
                if ($request->total) {
                    $doknkID = DokumenNK::insertGetId([
                        'id_nonkasbon' => $nonkasbon->id,
                        'total' => $request->Input('total'),
                        'catatan' => $request->Input('catatan'),
                        'updated_at' =>  $now,
                        'created_at' =>  $now

                    ]);
                    foreach ($request->dokumen as $key => $dokumen) {
                        $data = new DokumenNKD();
                        $nominal = $request->input('nominal');
                        $data->id_dnk = $doknkID;
                        $data->dokumen = $dokumen;
                        $data->nominal = $nominal[$key];
                        $data->save();
                    }
                }
            }
        });
        return redirect()->route('nonkasbon.index')->with('success', 'Non Kasbon updated successfully');
    }

    public function show($id)
    {
        $pph = PPH::all();
        $nonkasbon = nonkasbon::find($id);
        $title = 'Non Kasbon';
        return view('vnk.lihat-nonkasbon', compact('nonkasbon', 'title', 'pph'));
    }

    public function show_v($id)
    {
        $pph = PPH::all();
        $nonkasbon = nonkasbon::find($id);
        $title = 'Non Kasbon';
        return view('vnk.lihat-nonkasbon-v', compact('nonkasbon', 'title', 'pph'));
    }

    public function kelengkapan($id)
    {
        $nonkasbon = nonkasbon::find($id);
        $title = 'Non Kasbon';
        return view('vnk.lihat-kelengkapan', compact('nonkasbon', 'title'));
    }

    public function kelengkapan_v($id)
    {
        $nonkasbon = nonkasbon::find($id);
        $title = 'Non Kasbon';
        return view('vnk.lihat-kelengkapan-v', compact('nonkasbon', 'title'));
    }

    public function kelengkapan_edit($id)
    {
        $nonkasbon = nonkasbon::find($id);
        $title = 'Non Kasbon';
        return view('vnk.lihat-kelengkapan-edit', compact('nonkasbon', 'title'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VerifikasiNonKasbon  $verifikasiNonKasbon
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VerifikasiNonKasbon  $verifikasiNonKasbon
     * @return \Illuminate\Http\Response
     */
    public function edit(VerifikasiNonKasbon $verifikasiNonKasbon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVerifikasiNonKasbonRequest  $request
     * @param  \App\Models\VerifikasiNonKasbon  $verifikasiNonKasbon
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VerifikasiNonKasbon  $verifikasiNonKasbon
     * @return \Illuminate\Http\Response
     */
    public function destroy(VerifikasiNonKasbon $verifikasiNonKasbon)
    {
        //
    }
}
