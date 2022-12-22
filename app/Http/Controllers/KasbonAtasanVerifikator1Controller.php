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
use App\Models\KeteranganKasbon;
use App\Models\Keterangan_detail;
use App\Models\KodeKasbon;
use App\Models\MonitoringSP;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KasbonAtasanVerifikator1Controller extends Controller
{
    function __construct()
    {
        $this->middleware('permission:atasan-verifikator-1', ['only' => ['index', 'store', 'create', 'edit', 'update', 'destroy']]);
    }

    public function index(Request $request)
    {
        $kasbon = Kasbon::all();
        $title = 'Kasbon';
        return view('vkb-atasan-verifikator-1.index', compact('kasbon', 'title'))->with('i', (request()->input('page', 1) - 1) * 5);
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
    public function show(Verifikator $verifikator)
    {
        //
    }

    public function show_v($id)
    {
        $pph = PPH::all();
        $kasbon = Kasbon::find($id);
        $title = 'Kasbon';
        return view('vkb-atasan-verifikator-1.lihat-kasbon-v', compact('kasbon', 'title', 'pph'));
    }

    public function kelengkapan_v($id)
    {
        $kasbon = Kasbon::find($id);
        $title = 'Kasbon';
        return view('vkb-atasan-verifikator-1.lihat-kelengkapan-v', compact('kasbon', 'title'));
    }

    public function dokumen($id)
    {
        $kasbon = Kasbon::find($id);
        $title = 'Kasbon';
        return view('vkb-atasan-verifikator-1.lihat-dokumen', compact('kasbon', 'title'));
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
        DB::transaction(function () use ($request, $id) {

            $now = Carbon::now('Asia/Jakarta');
            $kasbon = Kasbon::find($id);
            $k_total = $kasbon->k_total;
            if ($kasbon->k_total > 0 && $kasbon->k_total <= 10000000) {
                if ($kasbon->verifikasikasbon->vkb_a_2 = $request->Input('status') == 'Terverifikasi') {
                    $kasbon->verifikasikasbon->vkb_a_2 = $request->Input('status');
                    $kasbon->verifikasikasbon->vkb_a_1 = $request->Input('status');
                    $kasbon->verifikasikasbon->status = $request->Input('status');
                } elseif ($kasbon->verifikasikasbon->vkb_a_2 = $request->Input('status') == 'Ditolak') {
                    $kasbon->verifikasikasbon->vkb_a_2 = $request->Input('status');
                    $kasbon->verifikasikasbon->vkb_a_1 = $request->Input('status');
                    $kasbon->verifikasikasbon->vkb = $request->Input('status');
                    $kasbon->verifikasikasbon->status = $request->Input('status');
                } else {
                    $kasbon->verifikasikasbon->vkb_a_2 = $request->Input('status');
                    $kasbon->verifikasikasbon->status = $request->Input('status');
                }
            } elseif ($kasbon->k_total > 20000000) {
                if ($kasbon->verifikasikasbon->vkb_a_2 = $request->Input('status') == 'Terverifikasi') {
                    $kasbon->verifikasikasbon->vkb_a_2 = $request->Input('status');
                    $kasbon->verifikasikasbon->vkb_a_3 = 'Dalam Proses';
                } elseif ($kasbon->verifikasikasbon->vkb_a_2 = $request->Input('status') == 'Ditolak') {
                    $kasbon->verifikasikasbon->vkb_a_2 = $request->Input('status');
                    $kasbon->verifikasikasbon->vkb_a_12 = $request->Input('status');
                    $kasbon->verifikasikasbon->vkb_a_13 = $request->Input('status');
                    $kasbon->verifikasikasbon->vkb_a_1 = $request->Input('status');
                    $kasbon->verifikasikasbon->vkb = $request->Input('status');
                    $kasbon->verifikasikasbon->status = $request->Input('status');
                } else {
                    $kasbon->verifikasikasbon->vkb_a_2 = $request->Input('status');
                    $kasbon->verifikasikasbon->status = $request->Input('status');
                }
            }
            $keteranganID  = $kasbon->kelengkapan->keterangan->id;
            $keterangan = Keterangan::find($keteranganID);
            $keterangan->update([
                'catatan' => $request->Input('catatan'),
                'updated_at' => $now,
            ]);

            $kasbon->verifikasikasbon->tgl_vkb_a_2 = $now;
            $kasbon->verifikasikasbon->updated_at = $now;
            $kasbon->verifikasikasbon->id_vkb_a_2 = Auth::user()->id;
            $kasbon->verifikasikasbon->update();
        });

        return redirect()->route('vkb-atasan-verifikator-1.index')->with('success', 'Kasbon updated successfully');
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
        $kelengkapan = Kelengkapan::find($id);

        $title = 'Detail';

        return view('vkb-atasan-verifikator-1.cek_kasbon', compact('title', 'kelengkapan'));
    }

    public function cek_kasbon_edit($id)
    {
        $kasbon = Kasbon::find($id);
        $detail = KeteranganKasbon::where('id_kasbon', $id)->get();
        $title = 'Detail';
        return view('vkb-atasan-verifikator-1.cek_kasbon_edit', compact('title', 'kasbon', 'detail'));
    }

    public function store(Request $request)
    {
        $id = $request->id;
        $kasbon = Kasbon::find($id);
        $now = Carbon::now('Asia/Jakarta');

        DB::transaction(function () use ($kasbon, $request, $id, $now) {
            if ($kasbon->k_total > 0 && $kasbon->k_total <= 20000000) {
                if ($kasbon->verifikasikasbon->vkb_a_2 = $request->Input('status') == 'Terverifikasi') {
                    $kasbon->verifikasikasbon->vkb_a_2 = $request->Input('status');
                    $kasbon->verifikasikasbon->status = $request->Input('status');
                } elseif ($kasbon->verifikasikasbon->vkb_a_2 = $request->Input('status') == 'Ditolak') {
                    $kasbon->verifikasikasbon->vkb_a_2 = $request->Input('status');
                    $kasbon->verifikasikasbon->vkb_a_12 = $request->Input('status');
                    $kasbon->verifikasikasbon->vkb_a_1 = $request->Input('status');
                    $kasbon->verifikasikasbon->vkb = $request->Input('status');
                    $kasbon->verifikasikasbon->status = $request->Input('status');
                } else {
                    $kasbon->verifikasikasbon->vkb_a_2 = $request->Input('status');
                    $kasbon->verifikasikasbon->status = $request->Input('status');
                }
            } elseif ($kasbon->k_total > 20000000) {
                if ($kasbon->verifikasikasbon->vkb_a_2 = $request->Input('status') == 'Terverifikasi') {
                    $kasbon->verifikasikasbon->vkb_a_2 = $request->Input('status');
                    $kasbon->verifikasikasbon->vkb_a_3 = 'Dalam Proses';
                } elseif ($kasbon->verifikasikasbon->vkb_a_2 = $request->Input('status') == 'Ditolak') {
                    $kasbon->verifikasikasbon->vkb_a_2 = $request->Input('status');
                    $kasbon->verifikasikasbon->vkb_a_12 = $request->Input('status');
                    $kasbon->verifikasikasbon->vkb_a_1 = $request->Input('status');
                    $kasbon->verifikasikasbon->vkb = $request->Input('status');
                    $kasbon->verifikasikasbon->status = $request->Input('status');
                } else {
                    $kasbon->verifikasikasbon->vkb_a_2 = $request->Input('status');
                    $kasbon->verifikasikasbon->status = $request->Input('status');
                }
            }

            $now = Carbon::now('Asia/Jakarta');
            $kasbon->verifikasikasbon->tgl_vkb_a_2 = $now;
            $kasbon->verifikasikasbon->updated_at = $now;
            $kasbon->verifikasikasbon->id_vkb_a_2 = Auth::user()->id;
            $kasbon->verifikasikasbon->save();
        });

        return redirect()->route('vkb-atasan-verifikator-1.index')
            ->with('success', 'Kasbon berhasil diverifikasi');
    }
}
