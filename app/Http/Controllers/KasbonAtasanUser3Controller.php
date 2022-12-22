<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Kasbon;
use App\Models\Kurs;
use App\Models\Jenis;
use App\Models\Pph;
use App\Models\User;
use App\Models\Verifikator;
use App\Models\Kelengkapan;
use App\Models\KeteranganKasbon;
use App\Models\KodeKasbon;
use App\Models\Keterangan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KasbonAtasanUser3Controller extends Controller
{
    function __construct()
    {
        $this->middleware('permission:atasan-user-3', ['only' => ['index', 'store', 'create',  'edit', 'update', 'destroy']]);
    }

    public function index(Request $request)
    {
        if (Auth::user()->hasRole('ADMIN')  == 'ADMIN') {
            $kasbon = Kasbon::all();
        } else {
            $kasbon = Kasbon::where('id_unit', Auth::user()->id_unit)->get();
        }
        $title = 'Kasbon';
        return view('vkb-atasan-user-3.index', compact('kasbon', 'title'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        $kasbon = Kasbon::find($id);
        $title = 'Kasbon';
        return view('vkb-atasan-user-3.lihat-kasbon', compact('kasbon', 'title'));
    }

    public function kelengkapan($id)
    {
        $kasbon = Kasbon::find($id);
        $title = 'Kasbon';
        return view('vkb-atasan-user-3.lihat-kelengkapan', compact('kasbon', 'title'));
    }

    public function dokumen($id)
    {
        $kasbon = Kasbon::find($id);
        $title = 'Kasbon';
        return view('vkb-atasan-user-3.lihat-dokumen', compact('kasbon', 'title'));
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
            if ($kasbon->verifikasikasbon->vkb_a_13 = $request->Input('status') == 'Terverifikasi') {
                $kasbon->verifikasikasbon->vkb = 'Dalam Proses';
                $kasbon->verifikasikasbon->vkb_a_13 = $request->Input('status');
            } elseif ($kasbon->verifikasikasbon->vkb_a_13 = $request->Input('status') == 'Ditolak') {
                $kasbon->verifikasikasbon->vkb_a_13 = $request->Input('status');
                $kasbon->verifikasikasbon->status = $request->Input('status');
            } else {
                $kasbon->verifikasikasbon->vkb_a_13 = $request->Input('status');
                $kasbon->verifikasikasbon->status = $request->Input('status');
            }
            $kasbon->verifikasikasbon->update([
                'tgl_vkb_a_13' => $now,
                'updated_at' => $now,
                'vkb_a_13' => $request->Input('status'),
                'status' => $request->Input('status'),
                'id_vkb_a_13' => Auth::user()->id
            ]);

            $keteranganID  = $kasbon->kelengkapan->keterangan->id;
            $keterangan = Keterangan::find($keteranganID);
            $keterangan->update([
                'catatan' => $request->Input('catatan'),
                'updated_at' => $now,
            ]);
        });
        return redirect()->route('vkb-atasan-user-3.index')->with('success', 'Kasbon updated successfully');
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


    public function store(Request $request)
    {
        $id = $request->id;
        $kasbon = Kasbon::find($id);
        $now = Carbon::now('Asia/Jakarta');
        DB::transaction(function () use ($kasbon, $request, $id, $now) {

            KeteranganKasbon::insertGetId([
                'id_kasbon' => $id,
                'keterangan' => $request->Input('keterangan'),
                'created_at' => $now,
                'updated_at' => $now
            ]);

            if ($kasbon->verifikasikasbon->vkb_a_13 = $request->Input('status') == 'Terverifikasi') {
                $kasbon->verifikasikasbon->vkb_a_13 = $request->Input('status');
                $kasbon->verifikasikasbon->vkb = 'Dalam Proses';
            } elseif ($kasbon->verifikasikasbon->vkb_a_13 = $request->Input('status') == 'Ditolak') {
                $kasbon->verifikasikasbon->vkb_a_13 = $request->Input('status');
                $kasbon->verifikasikasbon->status = $request->Input('status');
            } else {
                $kasbon->verifikasikasbon->vkb_a_13 = $request->Input('status');
                $kasbon->verifikasikasbon->status = $request->Input('status');
            }

            $kasbon->verifikasikasbon->tgl_vkb_a_13 = $now;
            $kasbon->verifikasikasbon->id_vkb_a_13 = Auth::user()->id;
            $kasbon->verifikasikasbon->updated_at = $now;
            $kasbon->verifikasikasbon->save();
        });

        return redirect()->route('vkb-atasan-user-3.index')
            ->with('success', 'Kasbon berhasil diverifikasi');
    }
}
