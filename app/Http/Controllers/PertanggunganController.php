<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\Pertanggungan;
use Illuminate\Support\Str;
use App\Models\Kasbon;
use App\Models\Keterangan_detail;
use App\Models\KeteranganPertanggungan;
use App\Models\VerifikasiPertanggungan;
use App\Models\MonitoringSP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PertanggunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:pertanggungan', ['only' => ['index', 'show', 'create', 'store', 'insert', 'storee', 'edit', 'update', 'destroy', 'verifikasi']]);
    }

    public function generatePDF($id)
    {
        $pertanggungan = Pertanggungan::find($id);
        $kd = $pertanggungan->kasbon->kelengkapan->keterangan->id;
        $keterangan = Keterangan_detail::where('id_keterangan', $kd)->get();
        $detail = Keterangan_detail::where('id_keterangan', $kd)->get();
        return view('pdf.print-pertanggungan', compact('pertanggungan', 'detail', 'keterangan'));
    }


    public function index()
    {
        $title = 'Pertanggungan';
        if (Auth::user()->hasRole('ADMIN')  == 'ADMIN') {
            $pertanggungan = Pertanggungan::all();
        } else {
            $pertanggungan = Pertanggungan::where('id_unit', Auth::user()->id_unit)->get();
        }
        return view('pertanggungan.index', compact('pertanggungan', 'title'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $kasbon = Kasbon::find($id);
        $title = 'Pertanggungan';
        return view('pertanggungan.entry', compact('title', 'kasbon'));
    }

    public function insert($id)
    {
        $kasbon = Kasbon::find($id);
        $title = 'Pertanggungan';
        return view('pertanggungan.entry', compact('title', 'kasbon'));
    }

    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {

            $id = $request->id;
            $kasbon = Kasbon::find($id);
            $now = Carbon::now('Asia/Jakarta');
            $selisihptj = Str::replace(',', '', $request->nilaiptj) - Str::replace(',', '', $kasbon->total);
            $pertanggunganID = Pertanggungan::insertGetId([
                'tglptj' => $request->tglptj,
                'selisihptjakhir' => $request->selisihptjakhir,
                // 'novkbselisihptj' => $request->novkbselisihptj,
                'nilaiselisihptj' => Str::replace(',', '', $request->nilaiselisihptj),
                // 'selisihptjakhir'  => $request->selisihptjakhir,
                'nokasbon' => $kasbon->nokasbon,
                'id_user' => $kasbon->id_user,
                'id_kasbon' => $kasbon->id,
                'id_kodekasbon' => $kasbon->id_kodekasbon,
                'uraianpengguna' => $kasbon->uraianpengguna,
                'nip' => $kasbon->nip,
                'id_unit' => $kasbon->id_unit,
                'jeniskasbon' => $kasbon->jeniskasbon,
                'namavendor'  => $kasbon->namavendor,
                'noinvoice' => $kasbon->noinvoice,
                'po_vendor'  => $kasbon->po_vendor,
                'proyek'  => $kasbon->proyek,
                'po_customer' => $kasbon->po_customer,
                'formatkasbon'  => $kasbon->formatkasbon,
                'nominalkasbon'  => $kasbon->total,
                'tgltempo'  => $kasbon->tgltempo,
                'haritempo'  => $kasbon->haritempo,
                'novkbkasbon'  => $request->novkbkasbon,
                // 'tglbayarkeuser'  => $request->tglbayarkeuser,
                'nilaiptj'  => Str::replace(',', '', $request->nilaiptj),
                'selisihptj'  => Str::replace(',', '', $selisihptj),
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            // $idmsp = $kasbon->monitoringsp->id;
            // $msp = MonitoringSP::find($idmsp);
            // $msp->update([
            //     'ptj' => 'Sudah',
            //     'sp1' => 'Close',
            //     'sp2' => 'Close',
            //     'sp3' => 'Close',
            //     'mts' => 'Close',
            //     'pbsdm' => 'Close',
            //     'tgl_sp1' => $request->tgl_sp1,
            //     'tgl_sp2' => $request->tgl_sp2,
            //     'tgl_sp3' => $request->tgl_sp3,
            //     'tgl_mts' => $request->tgl_mts,
            //     'tgl_pbsdm' => $request->tgl_pbsdm,
            //     'updated_at' => $now,
            // ]);

            if (($kasbon->k_total < 10000000)) {
                VerifikasiPertanggungan::insertGetId([
                    'id_pertanggungan' => $pertanggunganID,
                    'vkp_a_1' => 'Dalam Proses',
                    'status' => 'Dalam Proses',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            } elseif (($kasbon->k_total > 10000000) && ($kasbon->k_total < 25000000)) {
                VerifikasiPertanggungan::insertGetId([
                    'id_pertanggungan' => $pertanggunganID,
                    'vkp_a_12' => 'Dalam Proses',
                    'status' => 'Dalam Proses',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            } elseif (($kasbon->k_total > 25000000) && ($kasbon->k_total < 100000000)) {
                VerifikasiPertanggungan::insertGetId([
                    'id_pertanggungan' => $pertanggunganID,
                    'vkp_a_13' => 'Dalam Proses',
                    'status' => 'Dalam Proses',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            } elseif ($kasbon->k_total > 100000000) {
                VerifikasiPertanggungan::insertGetId([
                    'id_pertanggungan' => $pertanggunganID,
                    'vkp_a_13' => 'Dalam Proses',
                    'status' => 'Dalam Proses',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        });
        return redirect()->route('pertanggungan.index')->with('success', 'Kasbon created successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePertanggunganRequest  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pertanggungan  $pertanggungan
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $pertanggungan = Pertanggungan::find($id);

        $title = 'Detail';

        return view('pertanggungan.show', compact('title', 'pertanggungan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pertanggungan  $pertanggungan
     * @return \Illuminate\Http\Response
     */

    public function cek($id)
    {
        $pertanggungan = Pertanggungan::find($id);

        $title = 'Detail';

        return view('pertanggungan.lihat-kelengkapan', compact('title', 'pertanggungan'));
    }

    public function edit($id)
    {
        $pertanggungan = Pertanggungan::find($id);
        $detail = KeteranganPertanggungan::where('id_pertanggungan', $id)->get();
        $title = 'Detail';
        return view('pertanggungan.edit', compact('title', 'pertanggungan', 'detail'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePertanggunganRequest  $request
     * @param  \App\Models\Pertanggungan  $pertanggungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = $request->id;
        $pertanggungan = Pertanggungan::find($id);
        $selisihptj = Str::replace(',', '', $request->nilaiptj) - Str::replace(',', '', $pertanggungan->kasbon->total);
        $nilaiptj = Str::replace(',', '', $request->nilaiptj);

        DB::transaction(function () use ($request, $id, $pertanggungan, $selisihptj, $nilaiptj) {

            $now = Carbon::now('Asia/Jakarta');
            $pertanggungan->tglptj = $request->tglptj;
            $pertanggungan->selisihptjakhir = $request->selisihptjakhir;
            $pertanggungan->novkbselisihptj = $request->novkbselisihptj;
            $pertanggungan->nilaiselisihptj = $request->nilaiselisihptj;
            $pertanggungan->selisihptjakhir  = $request->selisihptjakhir;
            $pertanggungan->nokasbon = $pertanggungan->kasbon->nokasbon;
            $pertanggungan->id_user = $pertanggungan->kasbon->id_user;
            $pertanggungan->id_kasbon = $pertanggungan->kasbon->id;
            $pertanggungan->id_kodekasbon = $pertanggungan->kasbon->id_kodekasbon;
            $pertanggungan->uraianpengguna = $pertanggungan->kasbon->uraianpengguna;
            $pertanggungan->nip = $pertanggungan->kasbon->nip;
            $pertanggungan->id_unit = $pertanggungan->kasbon->id_unit;
            $pertanggungan->jeniskasbon = $pertanggungan->kasbon->jeniskasbon;
            $pertanggungan->namavendor  = $pertanggungan->kasbon->namavendor;
            $pertanggungan->noinvoice = $pertanggungan->kasbon->noinvoice;
            $pertanggungan->po_vendor  = $pertanggungan->kasbon->po_vendor;
            $pertanggungan->proyek  = $pertanggungan->kasbon->proyek;
            $pertanggungan->po_customer = $pertanggungan->kasbon->po_customer;
            $pertanggungan->formatkasbon  = $pertanggungan->kasbon->formatkasbon;
            $pertanggungan->nominalkasbon  = $pertanggungan->kasbon->total;
            $pertanggungan->tgltempo  = $pertanggungan->kasbon->tgltempo;
            $pertanggungan->haritempo  = $pertanggungan->kasbon->haritempo;
            $pertanggungan->novkbkasbon  = $request->novkbkasbon;
            $pertanggungan->tglbayarkeuser  = $request->tglbayarkeuser;
            $pertanggungan->nilaiptj  = $nilaiptj;
            $pertanggungan->selisihptj  = $selisihptj;
            $pertanggungan->updated_at = $now;

            $pertanggungan->update();

            $idvkp = $pertanggungan->verifikasipertanggungan->id;
            $vkp = VerifikasiPertanggungan::find($idvkp);

            if (($pertanggungan->kasbon->k_total < 10000000)) {
                $vkp->update([
                    'vkp_a_1' => 'Dalam Proses',
                    'status' => 'Dalam Proses',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            } elseif (($pertanggungan->kasbon->k_total > 10000000) && ($pertanggungan->kasbon->k_total < 25000000)) {
                $vkp->update([
                    'vkp_a_12' => 'Dalam Proses',
                    'status' => 'Dalam Proses',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            } elseif (($pertanggungan->kasbon->k_total > 25000000) && ($pertanggungan->kasbon->k_total < 100000000)) {
                $vkp->update([
                    'vkp_a_13' => 'Dalam Proses',
                    'status' => 'Dalam Proses',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            } elseif ($pertanggungan->kasbon->k_total > 100000000) {
                $vkp->update([
                    'vkp_a_13' => 'Dalam Proses',
                    'status' => 'Dalam Proses',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        });
        return redirect()->route('pertanggungan.index')
            ->with('success', 'Pertanggungan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pertanggungan  $pertanggungan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pertanggungan::find($id)->delete();
        return redirect()->route('pertanggungan.index')
            ->with('success', 'Pertanggungan deleted successfully');
    }
}
