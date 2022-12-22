<?php

namespace App\Http\Controllers;

use App\Models\Pertanggungan;
use DB;
use Carbon\Carbon;
use App\Models\Keterangan_detail;
use App\Models\KeteranganPertanggungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PertanggunganAtasanVerifikator2Controller extends Controller
{
    function __construct()
    {
        $this->middleware('permission:atasan-verifikator-2', ['only' => ['index', 'store', 'create', 'edit', 'update', 'destroy']]);
    }

    public function index()
    {
        $title = 'Pertanggungan';
        $pertanggungan = Pertanggungan::all();
        return view('vkp-atasan-verifikator-2.index', compact('pertanggungan', 'title'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function cek_pertanggungan($id)
    {
        $pertanggungan = Pertanggungan::find($id);
        $title = 'Detail';
        return view('vkp-atasan-verifikator-2.cek_pertanggungan', compact('title', 'pertanggungan'));
    }
    public function cek_pertanggungan_edit($id)
    {
        $pertanggungan = Pertanggungan::find($id);
        $detail = Keterangan_detail::where('id_keterangan', $pertanggungan->kasbon->kelengkapan->keterangan->id)->get();
        $title = 'Detail';
        return view('vkp-atasan-verifikator-2.cek_pertanggungan_edit', compact('title', 'pertanggungan', 'detail'));
    }

    public function show_v($id)
    {
        $pertanggungan = pertanggungan::find($id);
        $title = 'Pertanggungan';
        return view('vkp-atasan-verifikator-2.lihat-kasbon-v', compact('pertanggungan', 'title'));
    }

    public function kelengkapan_v($id)
    {
        $pertanggungan = pertanggungan::find($id);
        $title = 'Pertanggungan';
        return view('vkp-atasan-verifikator-2.lihat-kelengkapan-v', compact('pertanggungan', 'title'));
    }

    public function update(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $now = Carbon::now('Asia/Jakarta');
            $pertanggungan = pertanggungan::find($id);

            $idketerangan =  $pertanggungan->keterangan_pertanggungan->id;
            $keterangan = KeteranganPertanggungan::find($idketerangan);
            $keterangan->update([
                'keterangan' => $request->Input('keterangan'),
                'updated_at' => $now
            ]);

            if ($pertanggungan->kasbon->k_total > 2000000 && $pertanggungan->kasbon->k_total <= 100000000) {
                if ($pertanggungan->verifikasipertanggungan->vkp_a_3 = $request->Input('status') == 'Terverifikasi') {
                    // $pertanggungan->verifikasipertanggungan->vkp_a_1 = $request->Input('status');
                    $pertanggungan->verifikasipertanggungan->vkp_a_12 = $request->Input('status');
                    $pertanggungan->verifikasipertanggungan->vkp = $request->Input('status');
                    $pertanggungan->verifikasipertanggungan->vkp_a_2 = $request->Input('status');
                    $pertanggungan->verifikasipertanggungan->vkp_a_3 = $request->Input('status');
                    $pertanggungan->verifikasipertanggungan->status = $request->Input('status');
                } elseif ($pertanggungan->verifikasipertanggungan->vkp_a_3 = $request->Input('status') == 'Ditolak') {
                    $pertanggungan->verifikasipertanggungan->vkp_a_12 = $request->Input('status');
                    $pertanggungan->verifikasipertanggungan->vkp_a_13 = $request->Input('status');
                    $pertanggungan->verifikasipertanggungan->vkp_a_3 = $request->Input('status');
                    $pertanggungan->verifikasipertanggungan->status = $request->Input('status');
                } else {
                    $pertanggungan->verifikasipertanggungan->vkp_a_3 = $request->Input('status');
                    $pertanggungan->verifikasipertanggungan->status =  $request->Input('status');
                }
            } elseif ($pertanggungan->kasbon->k_total > 100000000) {
                if ($pertanggungan->verifikasipertanggungan->vkp_a_3 = $request->Input('status') == 'Terverifikasi') {
                    $pertanggungan->verifikasipertanggungan->vkp_a_3 = $request->Input('status');
                    $pertanggungan->verifikasipertanggungan->vkp_a_4 = 'Dalam Proses';
                } elseif ($pertanggungan->verifikasipertanggungan->vkp_a_3 = $request->Input('status') == 'Ditolak') {
                    $pertanggungan->verifikasipertanggungan->vkp_a_13 = $request->Input('status');
                    $pertanggungan->verifikasipertanggungan->vkp_a_3 = $request->Input('status');
                    $pertanggungan->verifikasipertanggungan->status = $request->Input('status');
                } else {
                    $pertanggungan->verifikasipertanggungan->vkp_a_3 = $request->Input('status');
                    $pertanggungan->verifikasipertanggungan->status =  $request->Input('status');
                }
            }


            $now = Carbon::now('Asia/Jakarta');
            $pertanggungan->verifikasipertanggungan->tgl_vkp_a_3 = $now;
            $pertanggungan->verifikasipertanggungan->updated_at = $now;
            $pertanggungan->verifikasipertanggungan->id_vkp_a_3 = Auth::user()->id;
            $pertanggungan->verifikasipertanggungan->save();
        });
        return redirect()->route('vkp-atasan-verifikator-2.index')->with('success', 'Pertanggungan updated successfully');
    }
}
