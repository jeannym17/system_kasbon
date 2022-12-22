<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertanggungan;
use App\Models\KeteranganPertanggungan;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;

class PertanggunganAtasanUser1Controller extends Controller
{
    function __construct()
    {
        $this->middleware('permission:atasan-user-1', ['only' => ['index', 'store', 'create',  'edit', 'update', 'destroy']]);
    }

    public function index(Request $request)
    {
        if (Auth::user()->hasRole('ADMIN')  == 'ADMIN') {
            $pertanggungan = Pertanggungan::all();
        } else {
            $pertanggungan = Pertanggungan::where('id_unit', Auth::user()->id_unit)->get();
        }
        $title = 'Pertanggungan';
        return view('vkp-atasan-user-1.index', compact('pertanggungan', 'title'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function show_v($id)
    {
        $pertanggungan = pertanggungan::find($id);
        $title = 'Pertanggungan';
        return view('vkp-atasan-user-1.lihat-kasbon-v', compact('pertanggungan', 'title'));
    }

    public function kelengkapan_v($id)
    {
        $pertanggungan = pertanggungan::find($id);
        $title = 'Pertanggungan';
        return view('vkp-atasan-user-1.lihat-kelengkapan-v', compact('pertanggungan', 'title'));
    }

    public function cek_pertanggungan($id)
    {
        $pertanggungan = Pertanggungan::find($id);

        $title = 'Detail';

        return view('vkp-atasan-user-1.cek_pertanggungan', compact('title', 'pertanggungan'));
    }

    public function cek_pertanggungan_edit($id)
    {
        $pertanggungan = pertanggungan::find($id);
        $detail = KeteranganPertanggungan::where('id_pertanggungan', $id)->get();

        $title = 'Detail';

        return view('vkp-atasan-user-1.cek_pertanggungan_edit', compact('title', 'pertanggungan', 'detail'));
    }

    public function store(Request $request)
    {
        $id = $request->id;
        $pertanggungan = Pertanggungan::find($id);
        $now = Carbon::now('Asia/Jakarta');
        DB::transaction(function () use ($pertanggungan, $request, $id, $now) {

            KeteranganPertanggungan::insertGetId([
                'id_pertanggungan' => $id,
                'keterangan' => $request->Input('keterangan'),
                'created_at' => $now,
                'updated_at' => $now
            ]);

            if ($pertanggungan->verifikasipertanggungan->vkp_a_1 = $request->Input('status') == 'Terverifikasi') {
                $pertanggungan->verifikasipertanggungan->vkp_a_1 = $request->Input('status');
                $pertanggungan->verifikasipertanggungan->vkp = 'Dalam Proses';
            } else {
                $pertanggungan->verifikasipertanggungan->vkp_a_1 = $request->Input('status');
                $pertanggungan->verifikasipertanggungan->status = $request->Input('status');
            }
            $pertanggungan->verifikasipertanggungan->tgl_vkp_a_1 = $now;
            $pertanggungan->verifikasipertanggungan->updated_at = $now;
            $pertanggungan->verifikasipertanggungan->id_vkp_a_1 = Auth::user()->id;
            $pertanggungan->verifikasipertanggungan->save();
        });

        return redirect()->route('vkp-atasan-user-1.index')->with('success', 'Pertanggungan updated successfully');
    }

    public function update(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $now = Carbon::now('Asia/Jakarta');
            $pertanggungan = Pertanggungan::find($id);
            if ($pertanggungan->verifikasipertanggungan->vkp_a_1 = $request->Input('status') == 'Terverifikasi') {
                $pertanggungan->verifikasipertanggungan->vkp_a_1 = $request->Input('status');
                $pertanggungan->verifikasipertanggungan->vkp = 'Dalam Proses';
            } else {
                $pertanggungan->verifikasipertanggungan->vkp_a_1 = $request->Input('status');
                $pertanggungan->verifikasipertanggungan->status = $request->Input('status');
            }
            $pertanggungan->verifikasipertanggungan->tgl_vkp_a_1 = $now;
            $pertanggungan->verifikasipertanggungan->updated_at = $now;
            $pertanggungan->verifikasipertanggungan->id_vkp_a_1 = Auth::user()->id;
            $pertanggungan->verifikasipertanggungan->save();

            $pertanggungan->verifikasipertanggungan->update([
                'vkp_a_1' => $request->Input('status'),
                'id_vkp_a_1' => Auth::user()->id
            ]);

            if (isset($pertanggungan->keterangan_pertanggungan->id)) {
                $idketerangan =  $pertanggungan->keterangan_pertanggungan->id;
                $keterangan = KeteranganPertanggungan::find($idketerangan);
                $keterangan->update([
                    'keterangan' => $request->Input('keterangan'),
                    'updated_at' => $now
                ]);
            } else {
                KeteranganPertanggungan::insertGetId([
                    'id_pertanggungan' => $id,
                    'keterangan' => $request->Input('keterangan'),
                    'created_at' => $now,
                    'updated_at' => $now
                ]);
            }
        });
        return redirect()->route('vkp-atasan-user-1.index')
            ->with('success', 'Pertanggungan berhasil diverifikasi');
    }
}
